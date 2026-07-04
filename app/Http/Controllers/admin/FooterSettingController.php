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
            'copyright_text'       => 'required|string|max:500',
            'privacy_policy_url'   => 'nullable|string|max:255',
            'terms_of_use_url'     => 'nullable|string|max:255',
            'youtube_label'        => 'nullable|string|max:255',
            'youtube_url'          => 'nullable|string|max:255',
            'youtube_channel_name' => 'nullable|string|max:255',
        ]);

        $setting = FooterSetting::firstOrCreate([]);
        $setting->update($request->only(
            'copyright_text', 'privacy_policy_url', 'terms_of_use_url',
            'youtube_label', 'youtube_url', 'youtube_channel_name'
        ));

        return redirect()->route('admin.footer-settings.edit')->with('success', 'Footer settings updated successfully.');
    }
}
