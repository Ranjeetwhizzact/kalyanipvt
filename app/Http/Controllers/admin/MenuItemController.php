<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuItemController extends Controller
{
    public function index()
    {
        try {

            $menuItems = MenuItem::with(['menu', 'page', 'parent'])
                ->orderBy('created_at')
                ->paginate(10);

            return view('admin.menu-items.index', compact('menuItems'));

        } catch (Exception $e) {

            Log::error('MenuItem index error: '.$e->getMessage());

            return back()->with('error', 'Unable to load menu items.');
        }
    }

    public function create()
    {
        $menus = Menu::orderBy('name')->get();
        $pages = Page::orderBy('title')->get();
        $menuItems = MenuItem::get();

        return view('admin.menu-items.create', compact('menus', 'pages', 'menuItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'page_id' => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menu_items,id',
            'title' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'target' => 'nullable|in:_self,_blank',
            'status' => 'required|in:active,inactive',
        ]);

        try {

            MenuItem::create([
                'menu_id' => $request->menu_id,
                'page_id' => $request->page_id,
                'parent_id' => $request->parent_id,
                'title' => $request->title,
                'sort_order' => $request->sort_order ?? 0,
                'target' => $request->target ?? '_self',
                'status' => $request->status ?? 'active',
            ]);

            return redirect()
                ->route('admin.menu-items.index')
                ->with('success', 'Menu item created successfully.');

        } catch (Exception $e) {

            Log::error('MenuItem store error: '.$e->getMessage());

            return back()
                ->with('error', 'Failed to create menu item.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {

            $menuItem = MenuItem::findOrFail(decrypt($id));

            $menus = Menu::orderBy('name')->get();
            $pages = Page::orderBy('title')->get();

            $menuItems = MenuItem::where('id', '!=', $menuItem->id)
                ->get();

            return view('admin.menu-items.edit',
                compact('menuItem', 'menus', 'pages', 'menuItems'));

        } catch (Exception $e) {

            Log::error('MenuItem edit error: '.$e->getMessage());

            return back()->with('error', 'Menu item not found.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
            'page_id' => 'nullable|exists:pages,id',
            'parent_id' => 'nullable|exists:menu_items,id',
            'title' => 'required|string|max:255',
            'sort_order' => 'nullable|integer',
            'target' => 'nullable|in:_self,_blank',
            'status' => 'required|in:active,inactive',
        ]);

        try {

            $menuItem = MenuItem::findOrFail(decrypt($id));

            $menuItem->update([
                'menu_id' => $request->menu_id,
                'page_id' => $request->page_id,
                'parent_id' => $request->parent_id,
                'title' => $request->title,
                'sort_order' => $request->sort_order ?? 0,
                'target' => $request->target ?? '_self',
                'status' => $request->status,
            ]);

            return redirect()
                ->route('admin.menu-items.index')
                ->with('success', 'Menu item updated successfully.');

        } catch (Exception $e) {

            Log::error('MenuItem update error: '.$e->getMessage());

            return back()
                ->with('error', 'Failed to update menu item.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $menuItem = MenuItem::findOrFail(decrypt($id));

            $menuItem->delete();

            return redirect()
                ->route('admin.menu-items.index')
                ->with('success', 'Menu item deleted successfully.');

        } catch (Exception $e) {

            Log::error('MenuItem delete error: '.$e->getMessage());

            return back()->with('error', 'Failed to delete menu item.');
        }
    }
}
