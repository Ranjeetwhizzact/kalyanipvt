<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CorporateMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CorporateMediaController extends Controller
{
    public function index()
    {
        $media = CorporateMedia::latest()->paginate(10);

        return view('admin.corporate-media.index', compact('media'));
    }

    public function create()
    {
        return view('admin.corporate-media.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:video,brochure',
            'video_url' => 'required_if:type,video|nullable|mimes:mp4,mov,avi,webm|max:51200',
            'file' => 'required_if:type,brochure|nullable|mimes:pdf,jpg,jpeg,png,webp|max:20480',
        ]);

        $filePath = null;
        $videoURL = null;

        if ($request->type == 'video' && $request->hasFile('video_url')) {

            $videoURL = $request->file('video_url')->store('videos', 'public');

        }

        if ($request->type == 'brochure' && $request->hasFile('file')) {

            $filePath = $request->file('file')->store('brochures', 'public');

        }

        CorporateMedia::create([
            'title' => $request->title,
            'type' => $request->type,
            'file_path' => $filePath,
            'video_url' => $videoURL,
            'description' => $request->description,
            'status' => $request->status ?? 1,
        ]);

        return redirect()
            ->route('admin.corporate-media.index')
            ->with('success', 'Corporate media added successfully');
    }

    public function edit($id)
    {

        $media_id = decrypt($id);
        $media = CorporateMedia::findOrFail($media_id);

        return view('admin.corporate-media.edit', compact('media'));

    }

    public function update(Request $request, $id)
    {
        $media_id = decrypt($id);
        $media = CorporateMedia::findOrFail($media_id);

        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|in:video,brochure',
            'video_url' => 'nullable|mimes:mp4,mov,avi,webm|max:51200',
            'file' => 'nullable|mimes:pdf,jpg,jpeg,png,webp|max:20480',
        ]);

        $filePath = $media->file_path;
        $videoURL = $media->video_url;

        if ($request->type == 'video' && $request->hasFile('video_url')) {
            if ($media->video_url && Storage::disk('public')->exists($media->video_url)) {
                Storage::disk('public')->delete($media->video_url);
            }
            $videoURL = $request->file('video_url')->store('videos', 'public');
            $filePath = null;
        }

        if ($request->type == 'brochure' && $request->hasFile('file')) {
            if ($media->file_path && Storage::disk('public')->exists($media->file_path)) {
                Storage::disk('public')->delete($media->file_path);
            }
            $filePath = $request->file('file')->store('brochures', 'public');
            $videoURL = null;
        }

        $media->update([
            'title' => $request->title,
            'type' => $request->type,
            'file_path' => $filePath,
            'video_url' => $videoURL,
            'description' => $request->description,
            'status' => $request->status ?? 1,
        ]);

        return redirect()
            ->route('admin.corporate-media.index')
            ->with('success', 'Corporate media updated successfully');
    }

    public function destroy($id)
    {
        $media_id = decrypt($id);
        $media = CorporateMedia::findOrFail($media_id);

        if ($media->file_path) {
            Storage::disk('public')->delete($media->file_path);
        }

        $media->delete();

        return redirect()
            ->route('admin.corporate-media.index')
            ->with('success', 'Corporate media deleted successfully');

    }
}
