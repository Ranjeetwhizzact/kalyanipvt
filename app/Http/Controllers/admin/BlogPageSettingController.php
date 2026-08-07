<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPageSetting;
use Illuminate\Http\Request;

class BlogPageSettingController extends Controller
{
    public function edit()
    {
        $setting = BlogPageSetting::firstOrCreate([], [
            'title' => 'Our',
            'title_highlight' => 'Latest Insights',
            'subtitle' => 'Stay updated with the latest trends in technology, career growth, and professional skill development.',
        ]);

        return view('admin.blog-page-settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'title_highlight' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
        ]);

        $setting = BlogPageSetting::firstOrCreate([]);

        $setting->title = $request->title;
        $setting->title_highlight = $request->title_highlight;
        $setting->subtitle = $request->subtitle;
        $setting->save();

        return redirect()->route('admin.blog-page-settings.edit')->with('success', 'Blog page settings updated successfully.');
    }
}
