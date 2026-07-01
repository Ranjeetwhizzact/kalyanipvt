<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionPoint;
class SectionController extends Controller
{
    //
    public function index()
    {
        $sections = Section::latest()->get();
        return view('admin.sections.index', compact('sections'));
    }
    public function show()
    {
        $sections = Section::latest()->get();
        return view('admin.sections.index',compact('sections'));
    }

    public function create()
    {
        return view('admin.sections.create');
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'page_name' => 'required',
        //     // 'section' => 'required',
        //     'section_type' => 'required',
        // ]);
        $section = new Section();

        $section->page_name = $request->page_name;
        $section->section_type= $request->section_type;
        $section->heading = $request->heading;
        $section->image_position = $request->image_position;
        $section->paragraph = $request->paragraph;
        $section->point_type = $request->point_type;
        $section->link = $request->link;
        $section->grid_layout = $request->grid_layout ?: 1;
        $section->order = $request->order ?: 1;


          if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $destinationPath = public_path('image_url');
            $file->move($destinationPath, $fileName);
            $section->image_url = 'image_url/' . $fileName;
        }

        $section->save();
        return redirect()->back()->with('success', 'Section created successfully');
    }

    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('sections.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'page_name' => 'required',
            'section' => 'required',
            'section_type' => 'required',
        ]);

        $section = Section::findOrFail($id);
        $section->update($request->all());

        return redirect()->route('sections.index')->with('success', 'Section updated successfully');
    }

    public function destroy($id)
    {
        $section = Section::findOrFail($id);
        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Section deleted successfully');
    }
}
