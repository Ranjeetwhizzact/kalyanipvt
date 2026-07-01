<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        try {

            $pages = Page::orderBy('created_at', 'desc')->paginate(10);

            return view('admin.pages.index', compact('pages'));

        } catch (Exception $e) {

            return back()->with('error',
                'An error occurred while fetching pages: '.$e->getMessage()
            );
        }
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        try {

            $page = new Page;

            $page->title = $request->title;

            /* Generate Unique Slug */

            $baseSlug = Str::slug($request->title);
            $slug = $baseSlug;
            $count = 1;

            while (Page::where('slug', $slug)->exists()) {
                $slug = $baseSlug.'-'.$count++;
            }

            $page->slug = $slug;
            $page->status = $request->status ?? 1;

            $page->save();

            return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Page created successfully.');

        } catch (Exception $e) {

            Log::error('Error creating page: '.$e->getMessage());

            return back()
                ->with('error', 'An error occurred while creating the page.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {

            $page_id = decrypt($id);

            $page = Page::findOrFail($page_id);

            return view('admin.pages.edit', compact('page'));

        } catch (Exception $e) {

            return back()->with('error',
                'An error occurred while fetching the page: '.$e->getMessage()
            );
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        try {

            $page_id = decrypt($id);

            $page = Page::findOrFail($page_id);

            $page->title = $request->title;

            /* Slug Update */

            if ($request->slug) {
                $page->slug = Str::slug($request->slug);
            }

            $page->status = $request->has('status') ? $request->status : 0;

            $page->save();

            return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Page updated successfully.');

        } catch (Exception $e) {

            return back()
                ->with('error', 'An error occurred while updating the page: '.$e->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $page_id = decrypt($id);

            $page = Page::findOrFail($page_id);

            $page->delete();

            return redirect()
                ->route('admin.pages.index')
                ->with('success', 'Page deleted successfully.');

        } catch (Exception $e) {

            return back()->with('error',
                'An error occurred while deleting the page: '.$e->getMessage()
            );
        }
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $file = $request->file('upload');

            $filename = time().'_'.$file->getClientOriginalName();

            $path = $file->storeAs('editor', $filename, 'public');

            return response()->json([
                'uploaded' => true,
                'url' => Storage::url($path),
            ]);
        }
    }
}

