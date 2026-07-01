<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function index()
    {
        try {

            $menus = Menu::latest()->paginate(10);

            return view('admin.menus.index', compact('menus'));

        } catch (Exception $e) {

            Log::error('Error fetching menus: '.$e->getMessage());

            return back()->with('error', 'Unable to load menus.');
        }
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        try {

            Menu::create([
                'name' => $request->name,
                'location' => $request->location,
            ]);

            return redirect()
                ->route('admin.menus.index')
                ->with('success', 'Menu created successfully.');

        } catch (Exception $e) {

            Log::error('Error creating menu: '.$e->getMessage());

            return back()
                ->with('error', 'Failed to create menu.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {

            $menu = Menu::findOrFail(decrypt($id));

            return view('admin.menus.edit', compact('menu'));

        } catch (Exception $e) {

            Log::error('Error fetching menu: '.$e->getMessage());

            return back()->with('error', 'Menu not found.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        try {

            $menu = Menu::findOrFail(decrypt($id));

            $menu->update([
                'name' => $request->name,
                'location' => $request->location,
            ]);

            return redirect()
                ->route('admin.menus.index')
                ->with('success', 'Menu updated successfully.');

        } catch (Exception $e) {

            Log::error('Error updating menu: '.$e->getMessage());

            return back()
                ->with('error', 'Failed to update menu.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $menu = Menu::findOrFail(decrypt($id));

            $menu->delete();

            return redirect()
                ->route('admin.menus.index')
                ->with('success', 'Menu deleted successfully.');

        } catch (Exception $e) {

            Log::error('Error deleting menu: '.$e->getMessage());

            return back()->with('error', 'Failed to delete menu.');
        }
    }
}
