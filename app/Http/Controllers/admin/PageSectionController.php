<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\LayoutPoint;
use App\Models\Page;
use App\Models\PageLayout;
use App\Models\PageSection;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageSectionController extends Controller
{
    public function index()
    {
        try {

            $sections = PageSection::with('page')
                ->orderBy('sort_order', 'asc')
                ->latest()
                ->paginate(10);

            return view('admin.page-sections.index', compact('sections'));
        } catch (Exception $e) {

            Log::error('Error fetching page sections: ' . $e->getMessage());

            return back()->with('error', 'Unable to fetch page sections.');
        }
    }

    public function create($id)
    {
        $page_id = decrypt($id);
        $page = Page::with('sections.layouts.points')->findOrFail($page_id);

        return view('admin.page-sections.create', compact('page'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_name' => 'required|string|max:255',
            'layout_type' => 'required|in:full-width,grid_2,grid_3',
            'image_layout' => 'required|in:top,left,right',
            'sort_order' => 'required|integer|min:1',
        ]);

        PageSection::create([
            'page_id' => $request->page_id,
            'section_name' => $validated['section_name'],
            'section_heading' => $request->section_heading,
            'section_subheading' => $request->section_subheading,
            'section_paragraph' => $request->section_paragraph,
            'layout_type' => $validated['layout_type'],
            'image_layout' => $validated['image_layout'],
            'sort_order' => $validated['sort_order'],
            'status' => 1,
        ]);

        return back()->with('success', 'Section Added');
    }

    public function storeLayout(Request $request)
    {
        Log::info('Received Layout Data', $request->all());
        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('sections', 'public');
        }
        Log::info('Text Color Value', [
            'text_colors' => $request->text_colors
        ]);
        PageLayout::create([
            'page_section_id' => $request->page_section_id,
            'image' => $image,
            'heading' => $request->heading,
            'heading_color' => $request->heading_color,
            'subheading' => $request->subheading,
            'subheading_color' => $request->subheading_color,
            'paragraph' => $request->paragraph,
            'point_type' => $request->point_type,
            'order' => $request->order,
            'link_text' => $request->link_text,
            'link_url' => $request->link_url,
            'text_colors' => $request->text_colors,
            'text_alignment' => $request->text_alignment,
            'status' => 1,
            'created_by' => auth('web')->id(),
        ]);

        return back()->with('success', 'Layout Added');
    }

    public function storePoint(Request $request)
    {

        $layoutId = $request->layout_id;

        if ($request->heading) {

            foreach ($request->heading as $index => $heading) {

                LayoutPoint::create([
                    'page_layouts_id' => $layoutId,
                    'heading' => $heading,
                    'text' => $request->text[$index] ?? null,
                    'status' => 1,
                    'created_by' => auth('web')->id(),
                ]);
            }
        }

        return back()->with('success', 'Points Added Successfully');
    }

    public function updateSection(Request $request, $id)
    {
        $section = PageSection::findOrFail($id);

        $section->update([
            'section_name' => $request->section_name,
            'section_heading' => $request->section_heading,
            'section_subheading' => $request->section_subheading,
            'section_paragraph' => $request->section_paragraph,
            'layout_type' => $request->layout_type,
            'image_layout' => $request->image_layout,
            'sort_order' => $request->sort_order,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Section Updated');
    }

    public function deleteSection($id)
    {

        $section = PageSection::findOrFail($id);
        PageLayout::where('page_section_id', $id)->delete();
        $section->delete();

        return back()->with('success', 'Section Deleted');
    }

    public function updateLayout(Request $request, $id)
    {
        Log::info('Full Request Data', $request->all());
        $layout = PageLayout::findOrFail($id);
        $image = $layout->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('sections', 'public');
        }
        Log::info('Text Color Value', [
            'text_colors' => $request->text_colors
        ]);
        $layout->update([
            'image' => $image,
            'heading' => $request->heading,
            'heading_color' => $request->heading_color,
            'subheading' => $request->subheading,
            'subheading_color' => $request->subheading_color,
            'paragraph' => $request->paragraph,
            'point_type' => $request->point_type,
            'order' => $request->order,
            'link_text' => $request->link_text,
            'link_url' => $request->link_url,
            'text_colors' => $request->text_colors,
            'text_alignment' => $request->text_alignment,
            'status' => $request->status,
        ]);

        return back()->with('success', 'Layout Updated');
    }

    public function deleteLayout($id)
    {

        LayoutPoint::where('page_layouts_id', $id)->delete();
        PageLayout::findOrFail($id)->delete();

        return back()->with('success', 'Layout Deleted');
    }

    public function updatePoint(Request $request, $id)
    {

        $point = LayoutPoint::findOrFail($id);

        $point->update([
            'heading' => $request->heading,
            'text' => $request->text,
        ]);

        return back()->with('success', 'Point Updated');
    }

    public function deletePoint($id)
    {
        LayoutPoint::findOrFail($id)->delete();

        return back()->with('success', 'Point Deleted');
    }
}
