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
            'map_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'show_home_button' => 'nullable|boolean',
            'map_paragraph' => 'nullable|string',
            'stat1_label' => 'nullable|string|max:255',
            'stat1_value' => 'nullable|string|max:255',
            'stat2_label' => 'nullable|string|max:255',
            'stat2_value' => 'nullable|string|max:255',
            'stat3_label' => 'nullable|string|max:255',
            'stat3_value' => 'nullable|string|max:255',
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

        if ($request->hasFile('map_image')) {
            // Delete old map image if it exists
            if ($setting->map_image && file_exists(public_path($setting->map_image)) && $setting->map_image !== '/map-base.png' && $setting->map_image !== 'map-base.png') {
                try {
                    unlink(public_path($setting->map_image));
                } catch (\Exception $e) {
                    // Ignore error
                }
            }

            $file = $request->file('map_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('product_page');
            $file->move($destinationPath, $fileName);

            $setting->map_image = '/product_page/' . $fileName;
        }

        $setting->title = $request->title;
        $setting->subtitle = $request->subtitle;
        $setting->show_home_button = $request->boolean('show_home_button');
        $setting->map_paragraph = $request->map_paragraph;
        $setting->stat1_label = $request->stat1_label;
        $setting->stat1_value = $request->stat1_value;
        $setting->stat2_label = $request->stat2_label;
        $setting->stat2_value = $request->stat2_value;
        $setting->stat3_label = $request->stat3_label;
        $setting->stat3_value = $request->stat3_value;
        $setting->save();

        return redirect()->route('admin.product-page-settings.edit')->with('success', 'Product page settings updated successfully.');
    }
}
