<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProductPageSetting;
use Illuminate\Http\Request;

class ProductPageSettingController extends Controller
{
    public function edit()
    {
        $setting = ProductPageSetting::firstOrCreate([], [
            'title' => 'Products We Offer for your Agriculture Solution',
            'subtitle' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid non nisi voluptate ipsam architecto necessitatibus qui natus suscipit mollitia harum?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur earum rerum fugit officiis quisquam ipsam magni facilis aliquam corporis? Rerum.',
            'image' => '/HomeImage.png',
        ]);

        return view('admin.product-page-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:500',
            'subtitle' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'show_home_button' => 'nullable|boolean',
        ]);

        $setting = ProductPageSetting::firstOrCreate([]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($setting->image && file_exists(public_path($setting->image)) && $setting->image !== '/HomeImage.png' && $setting->image !== 'HomeImage.png') {
                try {
                    unlink(public_path($setting->image));
                } catch (\Exception $e) {
                    // Ignore error
                }
            }

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('product_page');
            $file->move($destinationPath, $fileName);

            $setting->image = '/product_page/' . $fileName;
        }

        $setting->title = $request->title;
        $setting->subtitle = $request->subtitle;
        $setting->show_home_button = $request->boolean('show_home_button');
        $setting->save();

        return redirect()->route('admin.product-page-settings.edit')->with('success', 'Product page settings updated successfully.');
    }
}
