<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterSettingController extends Controller
{
    public function edit()
    {
        $setting = FooterSetting::firstOrCreate([], [
            'copyright_text'     => '© ' . date('Y') . ' All Rights Reserved.',
            'privacy_policy_url' => '#',
            'terms_of_use_url'   => '#',
        ]);

        return view('admin.footer-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'logo'                 => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'copyright_text'       => 'required|string|max:500',
            'privacy_policy_url'   => 'nullable|string|max:255',
            'terms_of_use_url'     => 'nullable|string|max:255',
            'youtube_label'        => 'nullable|string|max:255',
            'youtube_url'          => 'nullable|string|max:255',
            'youtube_channel_name' => 'nullable|string|max:255',
        ]);

        $setting = FooterSetting::firstOrCreate([]);

        if ($request->hasFile('logo')) {
            if ($setting->logo && file_exists(public_path($setting->logo))) {
                @unlink(public_path($setting->logo));
            }

            $file = $request->file('logo');
            $fileName = time() . '_logo_' . $file->getClientOriginalName();
            $uploadPath = public_path('uploads/settings');
            $file->move($uploadPath, $fileName);

            $setting->logo = 'uploads/settings/' . $fileName;
        }

        $setting->copyright_text = $request->copyright_text;
        $setting->privacy_policy_url = $request->privacy_policy_url;
        $setting->terms_of_use_url = $request->terms_of_use_url;
        $setting->youtube_label = $request->youtube_label;
        $setting->youtube_url = $request->youtube_url;
        $setting->youtube_channel_name = $request->youtube_channel_name;
        $setting->save();

        return redirect()->route('admin.footer-settings.edit')->with('success', 'Footer settings updated successfully.');
    }
}
