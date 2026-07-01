<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Navbar;

class NavbarController extends Controller
{
    //
public function viewnabar()
{
    try {
        $navbarItems = Navbar::where('location', 'navbar')
                              ->where('status', 'active')
                              ->whereNull('parent_id')
                              ->orderBy('order_no', 'asc')
                              ->paginate(5);

        return view('admin.navbar.index', compact('navbarItems'));

    } catch (\Exception $e) {
        Log::error('Navbar Load Error: ' . $e->getMessage());
        return view('header', [
            'navbarItems' => collect()->paginate(5)
        ])->with('error', 'Navbar could not be loaded.');
    }
}

public function createnavbar(){
    $parentMenus = Navbar::where('location', 'navbar')
                              ->where('status', 'active')
                              ->whereNull('parent_id')
                              ->orderBy('order_no', 'asc')
                              ->paginate(5);
    return view('admin.navbar.create',['parentMenus' =>$parentMenus]);
}
public function preview(Request $request)
{
    if (!$request->ajax()) {
        abort(404);
    }

    $data = $request->all();
    $type = $request->type;

    // Generate preview HTML based on type
    $preview = '';
    switch($type) {
        case 'link':
            $preview = '<div class="flex items-center p-3 bg-white rounded-lg shadow">
                <i class="ri-link mr-3 text-blue-500"></i>
                <span class="font-medium">' . e($request->title) . '</span>
                <span class="ml-2 text-sm text-gray-500">→ ' . e($request->url) . '</span>
            </div>';
            break;

        case 'dropdown':
            $preview = '<div class="flex items-center p-3 bg-white rounded-lg shadow">
                <i class="ri-menu-fold mr-3 text-purple-500"></i>
                <span class="font-medium">' . e($request->title) . '</span>
                <span class="ml-2 text-sm text-purple-600">(Dropdown)</span>
            </div>';
            break;

        case 'image':
            $imageSrc = '';
            if ($request->hasFile('image')) {
                $imageSrc = 'Uploaded image preview';
            } elseif ($request->image_path) {
                $imageSrc = e($request->image_path);
            }

            $preview = '<div class="p-3 bg-white rounded-lg shadow">
                <div class="flex items-center mb-2">
                    <i class="ri-image-line mr-3 text-green-500"></i>
                    <span class="font-medium">Image Menu</span>
                </div>
                <div class="text-sm text-gray-600">
                    <p>Image: ' . $imageSrc . '</p>
                    <p>Links to: ' . e($request->url) . '</p>
                </div>
            </div>';
            break;
    }

    return response()->json([
        'success' => true,
        'preview' => $preview
    ]);
}

public function store(Request $request)
    {
        $request->validate([
            'title'      => 'nullable|string|max:150',
            'type'       => 'nullable|in:link,dropdown,image',
            'url'        => 'nullable|string',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048',
            'location'   => 'nullable|in:navbar,sidebar',
            'alignment'  => 'nullable|in:left,center,right',
        ]);

        $data = $request->all();

        // 1. Handle Image Upload if type is "image"
        if ($request->hasFile('image_path')) {
            $imageName = time() . '_' . Str::slug($request->title) . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('uploads/navbar'), $imageName);
            $data['image_path'] = 'uploads/navbar/' . $imageName;
        }

        // 2. URL Sanitization
        // If it's a dropdown, we usually set URL to '#' or null
        if ($request->type === 'dropdown') {
            $data['url'] = '#';
        }

        Navbar::create($data);

        return redirect()->route('admin.navbar.index')
                         ->with('success', 'Menu item created successfully!');
    }


}
