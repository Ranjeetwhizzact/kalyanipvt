<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionItem;

class CompanyProfileController extends Controller
{
    public function index()
    {
        $sections = Section::with('items')->paginate(10);
        return view('admin.company-profile.index', compact('sections'));
    }

    public function create()
    {
        return view('admin.company-profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section_key'   => 'required|unique:sections,section_key',
            'title'         => 'nullable|string',
            'content'       => 'nullable|string',
            'type'          => 'required|in:hero,default,list,image_text',

            'image'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_md'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_sm'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $uploadPath = public_path('uploads/company_profile');

        // Desktop Image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name = uniqid() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $name);
            $imagePath = 'uploads/company_profile/' . $name;
        }

        // Tablet Image
        $imageMdPath = null;
        if ($request->hasFile('image_md')) {
            $file = $request->file('image_md');
            $name = uniqid() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $name);
            $imageMdPath = 'uploads/company_profile/' . $name;
        }

        // Mobile Image
        $imageSmPath = null;
        if ($request->hasFile('image_sm')) {
            $file = $request->file('image_sm');
            $name = uniqid() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $name);
            $imageSmPath = 'uploads/company_profile/' . $name;
        }

        // Content Image
        $contentImagePath = null;
        if ($request->hasFile('content_image')) {
            $file = $request->file('content_image');
            $name = uniqid() . '_' . $file->getClientOriginalName();
            $file->move($uploadPath, $name);
            $contentImagePath = 'uploads/company_profile/' . $name;
        }

        // Create Section
        $section = Section::create([
            'section_key'   => $request->section_key,
            'title'         => $request->title,
            'content'       => $request->content,
            'type'          => $request->type,
            'image'         => $imagePath,
            'image_md'      => $imageMdPath,
            'image_sm'      => $imageSmPath,
            'content_image' => $contentImagePath,
        ]);

        // Save Section Items
        if ($request->titles) {
            foreach ($request->titles as $key => $title) {
                if ($title) {
                    SectionItem::create([
                        'section_id' => $section->id,
                        'title' => $title,
                        'description' => $request->descriptions[$key] ?? null,
                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.company-profile.index')
            ->with('success', 'Section created successfully!');
    }

    public function edit($id)
    {
        $section = Section::with('items')->findOrFail($id);
        return view('admin.company-profile.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $section = Section::findOrFail($id);

        // ✅ Validation
        $request->validate([
            'section_key' => 'required|unique:sections,section_key,' . $id,
            'title' => 'nullable|string',
            'content' => 'nullable|string',
            'type' => 'required|in:hero,default,list,image_text',

            // Images
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_md' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image_sm' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'content_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ Upload Folder
        $uploadPath = public_path('uploads/company_profile');

        // Helper function for image upload
        $uploadImage = function ($field, $oldPath = null) use ($request, $uploadPath) {
            if ($request->hasFile($field)) {

                // Delete old file
                if ($oldPath && file_exists(public_path($oldPath))) {
                    unlink(public_path($oldPath));
                }

                $file = $request->file($field);
                $fileName = time() . '_' . $field . '_' . $file->getClientOriginalName();
                $file->move($uploadPath, $fileName);

                return 'uploads/company_profile/' . $fileName;
            }

            return $oldPath;
        };

        // ✅ Assign Data
        $section->section_key = $request->section_key;
        $section->title = $request->title;
        $section->content = $request->content;
        $section->type = $request->type;

        // ✅ Handle Images
        $section->image = $uploadImage('image', $section->image);
        $section->image_md = $uploadImage('image_md', $section->image_md);
        $section->image_sm = $uploadImage('image_sm', $section->image_sm);
        $section->content_image = $uploadImage('content_image', $section->content_image);

        $section->save();

        // ✅ Update Items (Points)
        $section->items()->delete();

        if ($request->titles) {
            foreach ($request->titles as $key => $title) {
                if ($title) {
                    SectionItem::create([
                        'section_id' => $section->id,
                        'title' => $title,
                        'description' => $request->descriptions[$key] ?? null,
                    ]);
                }
            }
        }

        return redirect()
            ->route('admin.company-profile.index')
            ->with('success', 'Section updated successfully!');
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return back();
    }
}
