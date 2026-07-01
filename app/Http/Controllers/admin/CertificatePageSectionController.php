<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CertificatePageSection;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CertificatePageSectionController extends Controller
{
    public function index()
    {
        try {
            $sections = CertificatePageSection::orderBy('created_at', 'desc')->paginate(10);

            return view('admin.certificate-page-sections.index', compact('sections'));
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while fetching page sections: '.$e->getMessage());
        }
    }

    public function create()
    {
        return view('admin.certificate-page-sections.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'home_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'page_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
            'image_position' => 'nullable|in:left,right',
            'paragraph' => 'nullable|string',
            'point' => 'nullable|array',
            'point.*' => 'nullable|string',
            'section_type' => 'required|in:hero,section',
            'is_active' => 'nullable|in:0,1',
        ]);

        try {

            $section = new CertificatePageSection;
            $section->title = $request->title;
            $section->subheading = $request->subheading;
            $section->order = $request->order;
            $section->image_position = $request->image_position;
            $section->paragraph = $request->paragraph;
            $section->point = array_values(array_filter($request->point ?? []));
            $section->section_type = $request->section_type;
            $section->is_active = $request->is_active ?? 0;
            $baseSlug = Str::slug($request->title);
            $slug = $baseSlug;
            $count = 1;
            while (CertificatePageSection::where('slug', $slug)->exists()) {
                $slug = $baseSlug.'-'.$count++;
            }
            $section->slug = $slug;
            /* ===== Home Image Upload ===== */
            if ($request->hasFile('home_image')) {

                $destinationPath = public_path('/page_sections/home/');
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $fileName = time().'_'.$request->file('home_image')->getClientOriginalName();
                $request->file('home_image')->move($destinationPath, $fileName);
                $section->home_image = '/page_sections/home/'.$fileName;
            }
            /* ===== Page Image Upload ===== */
            if ($request->hasFile('page_image')) {
                $destinationPath = public_path('/page_sections/page/');
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $fileName = time().'_'.$request->file('page_image')->getClientOriginalName();
                $request->file('page_image')->move($destinationPath, $fileName);
                $section->page_image = '/page_sections/page/'.$fileName;
            }
            $section->save();

            return redirect()
                ->route('admin.certificate.page-sections.index')
                ->with('success', 'Page section created successfully.');

        } catch (Exception $e) {

            Log::error('Error creating page section: '.$e->getMessage());

            return back()
                ->with('error', 'An error occurred while creating the page section.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $section_id = decrypt($id);
            $section = CertificatePageSection::findOrFail($section_id);

            return view('admin.certificate-page-sections.edit', compact('section'));
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while fetching the page section: '.$e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subheading' => 'nullable|string|max:255',
            'home_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'page_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'nullable|integer',
            'image_position' => 'nullable|in:left,right',
            'paragraph' => 'nullable|string',
            'point' => 'nullable|array',
            'point.*' => 'nullable|string',
            'section_type' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'slug' => 'nullable|string|max:255',
        ]);

        try {

            $section_id = decrypt($id);
            $section = CertificatePageSection::findOrFail($section_id);

            $section->title = $request->title;
            $section->subheading = $request->subheading;
            $section->order = $request->order;
            $section->image_position = $request->image_position;
            $section->paragraph = $request->paragraph;
            $section->point = $request->point ? array_values(array_filter($request->point)) : null;
            $section->section_type = $request->section_type;
            $section->is_active = $request->has('is_active') ? $request->is_active : false;
            $section->slug = $request->slug;
            /* ===== Update Home Image ===== */
            if ($request->home_image) {
                if ($section->home_image && file_exists(public_path($section->home_image))) {
                    unlink(public_path($section->home_image));
                }
                $fileName = time().'_'.$request->file('home_image')->getClientOriginalName();
                $destinationPath = public_path().'/page_sections/home/';
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $request->file('home_image')->move($destinationPath, $fileName);
                $section->home_image = '/page_sections/home/'.$fileName;
            }

            /* ===== Update Page Image ===== */
            if ($request->page_image) {
                if ($section->page_image && file_exists(public_path($section->page_image))) {
                    unlink(public_path($section->page_image));
                }
                $fileName = time().'_'.$request->file('page_image')->getClientOriginalName();
                $destinationPath = public_path().'/page_sections/page/';
                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                $request->file('page_image')->move($destinationPath, $fileName);
                $section->page_image = '/page_sections/page/'.$fileName;
            }

            $section->save();

            return redirect()
                ->route('admin.certificate.page-sections.index')
                ->with('success', 'Page section updated successfully.');

        } catch (Exception $e) {

            return back()
                ->with('error', 'An error occurred while updating the page section: '.$e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $section_id = decrypt($id);
            $section = CertificatePageSection::findOrFail($section_id);
            $section->delete();

            return redirect()->route('admin.certificate.page-sections.index')->with('success', 'Page section deleted successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'An error occurred while deleting the page section: '.$e->getMessage());
        }
    }
}
