<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\SectionContent;
use App\Models\SectionPoint;
use Illuminate\Support\Facades\Log;


class DomesticBrandController extends Controller
{
    //
    public function index(){
        return view('admin.domesticbrandbusiness.index');
    }
    public function create(){
        return view('admin.domesticbrandbusiness.create');
    }
// public function store(Request $request)
// {
//     Log::info('Store function called');
//     Log::info('Request data:', $request->all());

//     try {
//         // ✅ Validation
//         $validated = $request->validate([
//             'section_type' => 'required|string',
//             'layout_type'  => 'nullable|string',
//             'order'        => 'nullable|integer',
//             'heading'      => 'nullable|string',
//             'image_url'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
//         ]);

//         Log::info('Validation passed', $validated);

//         // ✅ Save Section
//         $section = new Section;
//         $section->page_name = 'domestic brand business';
//         $section->section_type = $validated['section_type'];

//         if ($validated['section_type'] === 'hero') {
//             $section->layout_type = 1;
//             $section->order = 1;
//         } else {
//             $section->layout_type = $validated['layout_type'] ?? null;
//             $section->order = $validated['order'] ?? null;
//         }

//         $section->save();
//         Log::info('Section saved', ['section_id' => $section->id]);

//         // ✅ Save Section Content
//         $sectionContent = new SectionContent;
//         $sectionContent->section_id = $section->id;
//         $sectionContent->heading = $validated['heading'];

//         if ($request->hasFile('image_url')) {
//             Log::info('Image found');

//             $file = $request->file('image_url');
//             $fileName = time() . '_' . $file->getClientOriginalName();
//             $destinationPath = public_path('domesticbrandbusinessimage');

//             $file->move($destinationPath, $fileName);

//             $sectionContent->image_url = 'domesticbrandbusinessimage/' . $fileName;
//         }

//         $sectionContent->save();
//         Log::info('SectionContent saved');

//         return redirect()->back()->with('success', 'Page Section Created successfully');

//     } catch (\Exception $e) {
//         Log::error('Store failed', [
//             'error' => $e->getMessage(),
//             'line' => $e->getLine()
//         ]);

//         return redirect()->back()->with('error', 'Something went wrong');
//     }
// }


}
