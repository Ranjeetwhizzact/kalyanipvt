<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SocialMediaLinks;
use App\Models\HomepageStat;
use Illuminate\Http\Request;

class HomePageContentController extends Controller
{
    // Banner CRUD
    public function bannerindex()
    {
        $banners = Banner::paginate(10);
        return view('admin.homepage-content.banner.index', compact('banners'));
    }

    public function bannercreate()
    {
        return view('admin.homepage-content.banner.create');
    }

    public function bannerstore(Request $request)
    {
        $request->validate([
            'banner_type' => 'nullable|in:slider,text_only',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'link' => 'nullable|max:255',
            'is_active' => 'nullable|in:0,1',
            'display_order' => 'nullable|integer',
        ]);

        $imageBanner = null;
        if ($request->banner_type !== 'text_only' && $request->hasFile('banner_image')) {
            $file = $request->file('banner_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('banner_image');

            $file->move($destinationPath, $fileName);

            $imageBanner = 'banner_image/' . $fileName;
        }

        Banner::create([
            'banner_image' => $imageBanner,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'link' => $request->link,
            'is_active' => $request->is_active,
            'display_order' => $request->display_order,
        ]);

        return redirect()->route('admin.banner.index')->with('success', 'Banner Created Successfully');
    }

    public function banneredit($id)
    {
        $banner_id = decrypt($id);
        $banner = Banner::findOrFail($banner_id);

        return view('admin.homepage-content.banner.edit', compact('banner'));
    }

    public function bannerupdate(Request $request, $id)
    {
        $banner_id = decrypt($id);
        $banner = Banner::findOrFail($banner_id);

        $request->validate([
            'banner_type' => 'nullable|in:slider,text_only',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'link' => 'nullable|max:255',
            'is_active' => 'nullable|in:0,1',
            'display_order' => 'nullable|integer',
        ]);

        if ($request->banner_type === 'text_only') {
            if ($banner->banner_image && file_exists(public_path($banner->banner_image))) {
                unlink(public_path($banner->banner_image));
            }
            $banner->banner_image = null;
        } elseif ($request->hasFile('banner_image')) {

            if ($banner->banner_image && file_exists(public_path($banner->banner_image))) {
                unlink(public_path($banner->banner_image));
            }

            $file = $request->file('banner_image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('banner_image');
            $file->move($destinationPath, $fileName);

            $banner->banner_image = 'banner_image/' . $fileName;
        }

        $banner->title = $request->title;
        $banner->subtitle = $request->subtitle;
        $banner->link = $request->link;
        $banner->is_active = $request->is_active ?? 0;
        $banner->display_order = $request->display_order;
        $banner->save();

        return redirect()->route('admin.banner.index')
            ->with('success', 'Banner Updated Successfully!');
    }

    public function delete($id)
    {
        $banner_id = decrypt($id);
        $banner = Banner::findOrFail($banner_id);
        $banner->delete();

        return redirect()->route('admin.banner.index')->with('success', 'Banner Deleted Successfully!');
    }

    // Social Media
    public function socialindex()
    {
        $socials = SocialMediaLinks::orderBy('display_order')->paginate(10);

        return view('admin.homepage-content.social.index', compact('socials'));
    }

    public function socialcreate()
    {
        return view('admin.homepage-content.social.create');
    }

    public function socialstore(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|in:0,1',
        ]);

        $iconPath = null;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('social_icons'), $fileName);
            $iconPath = 'social_icons/' . $fileName;
        }

        $homepageIconPath = null;
        if ($request->hasFile('homepage_icon')) {
            $file = $request->file('homepage_icon');
            $fileName = time() . '_hp_' . $file->getClientOriginalName();
            $file->move(public_path('social_icons'), $fileName);
            $homepageIconPath = 'social_icons/' . $fileName;
        }

        SocialMediaLinks::create([
            'name'                => $request->name,
            'url'                 => $request->url,
            'icon'                => $iconPath,
            'icon_class'          => $request->icon_class,
            'homepage_icon'       => $homepageIconPath,
            'homepage_icon_class' => $request->homepage_icon_class,
            'display_order'       => $request->display_order,
            'is_active'           => $request->is_active ?? 0,
        ]);

        return redirect()->route('admin.social.index')
            ->with('success', 'Social Media Link Created Successfully!');
    }

    public function socialedit($id)
    {
        $social_id = decrypt($id);
        $social = SocialMediaLinks::findOrFail($social_id);

        return view('admin.homepage-content.social.edit', compact('social'));
    }

    public function socialupdate(Request $request, $id)
    {
        $social_id = decrypt($id);
        $social = SocialMediaLinks::findOrFail($social_id);

        $request->validate([
            'name' => 'required|max:100',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
            'display_order' => 'nullable|integer',
            'is_active' => 'nullable|in:0,1',
        ]);

        if ($request->hasFile('icon')) {
            if ($social->icon && file_exists(public_path($social->icon))) {
                unlink(public_path($social->icon));
            }
            $file = $request->file('icon');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('social_icons'), $fileName);
            $social->icon = 'social_icons/' . $fileName;
        }

        if ($request->hasFile('homepage_icon')) {
            if ($social->homepage_icon && file_exists(public_path($social->homepage_icon))) {
                unlink(public_path($social->homepage_icon));
            }
            $file = $request->file('homepage_icon');
            $fileName = time() . '_hp_' . $file->getClientOriginalName();
            $file->move(public_path('social_icons'), $fileName);
            $social->homepage_icon = 'social_icons/' . $fileName;
        }

        $social->name                = $request->name;
        $social->url                 = $request->url;
        $social->icon_class          = $request->icon_class;
        $social->homepage_icon_class = $request->homepage_icon_class;
        $social->display_order       = $request->display_order;
        $social->is_active           = $request->is_active ?? 0;
        $social->save();

        return redirect()->route('admin.social.index')
            ->with('success', 'Social Media Link Updated Successfully!');
    }

    public function socialdelete($id)
    {
        $social_id = decrypt($id);
        $social = SocialMediaLinks::findOrFail($social_id);

        if ($social->icon && file_exists(public_path($social->icon))) {
            unlink(public_path($social->icon));
        }

        $social->delete();

        return redirect()->route('admin.social.index')
            ->with('success', 'Social Media Link Deleted Successfully!');
    }

    // Hompagestats
    public function statindex()
    {
        $stats = HomepageStat::orderBy('id', 'desc')->paginate(10);
        $achievementSetting = HomepageStat::whereNotNull('section_heading')
            ->whereNotNull('section_description')
            ->first();

        return view('admin.homepage-content.stats.index', compact('stats', 'achievementSetting'));
    }

    public function statcreate()
    {
        return view('admin.homepage-content.stats.create');
    }

    public function statstore(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'value' => 'required|max:100',
            'is_active' => 'nullable|in:0,1',
        ]);

        HomepageStat::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'value' => $request->value,
            'is_active' => $request->is_active ?? 0,
        ]);

        return redirect()->route('admin.stats.index')
            ->with('success', 'Stat Created Successfully!');
    }

    public function statedit($id)
    {
        $stat = HomepageStat::findOrFail(decrypt($id));

        return view('admin.homepage-content.stats.edit', compact('stat'));
    }

    public function statupdate(Request $request, $id)
    {
        $stat = HomepageStat::findOrFail(decrypt($id));

        $request->validate([
            'title' => 'required|max:255',
            'subtitle' => 'nullable|max:255',
            'value' => 'required|max:100',
            'is_active' => 'nullable|in:0,1',
        ]);

        $stat->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'value' => $request->value,
            'is_active' => $request->is_active ?? 0,
        ]);

        return redirect()->route('admin.stats.index')
            ->with('success', 'Stat Updated Successfully!');
    }

    public function statdelete($id)
    {
        $stat = HomepageStat::findOrFail(decrypt($id));
        $stat->delete();

        return redirect()->route('admin.stats.index')
            ->with('success', 'Stat Deleted Successfully!');
    }

    public function updateAchievementSettings(Request $request, $id)
    {
        $setting_id = decrypt($id);

        $request->validate([
            'section_heading' => 'required|max:255',
            'section_description' => 'required',
        ]);

        $setting = HomepageStat::whereNotNull('section_heading')
            ->whereNotNull('section_description')
            ->first();

        if (!$setting) {
            $setting = HomepageStat::find($setting_id);
        }

        if (!$setting) {
            $setting = new HomepageStat();
        }

        $setting->section_heading = $request->section_heading;
        $setting->section_description = $request->section_description;
        $setting->is_active = 1;
        $setting->save();

        return redirect()->route('admin.stats.index')
            ->with('success', 'Achievement Settings Updated Successfully!');
    }
}
