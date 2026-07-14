<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    public function index()
    {
        try {
            $videos = Video::orderBy('created_at', 'asc')->paginate(10);
            return view('admin.videos.index', compact('videos'));
        } catch (Exception $e) {
            return back()->with('error', 'Failed to retrieve videos.');
        }

    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->merge(['video_type' => 'embed']);
        $request->validate([
            'video_type' => 'required|in:file,embed',
            'video_url' => 'required|url',
            'thumbnail_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120', // 5MB max
            'description' => 'nullable|string',
            'sequence_no' => 'nullable|integer',
            'is_active' => 'nullable|in:0,1',
        ]);

        try {
            $video = new Video;
            $video->video_type = $request->video_type;
            $video->description = $request->description;
            $video->sequence_no = $request->sequence_no;
            $video->is_active = $request->is_active ?? 0;

            if ($request->video_type === 'file') {
                if ($request->hasFile('video_path')) {
                    $destinationPath = public_path('/videos/uploads');
                    if (! file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }
                    $fileName = time().'_'.$request->file('video_path')->getClientOriginalName();
                    $request->file('video_path')->move($destinationPath, $fileName);
                    $video->video_path = '/videos/uploads/'.$fileName;
                }
            } else {
                $video->video_path = $request->video_url;
            }

            /* ===== Thumbnail Upload ===== */
            if ($request->hasFile('thumbnail_path')) {
                $thumbnailDestination = public_path('/videos/thumbnails');
                if (! file_exists($thumbnailDestination)) {
                    mkdir($thumbnailDestination, 0755, true);
                }
                $thumbName = time().'_'.$request->file('thumbnail_path')->getClientOriginalName();
                $request->file('thumbnail_path')->move($thumbnailDestination, $thumbName);
                $video->thumbnail_path = '/videos/thumbnails/'.$thumbName;
            }

            $video->save();

            return redirect()
                ->route('admin.videos.index')
                ->with('success', 'Video added successfully.');

        } catch (Exception $e) {
            Log::error('Error creating video: '.$e->getMessage());
            return back()
                ->with('error', 'An error occurred while adding the video.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {
            $videoID = decrypt($id);
            $video = Video::findOrFail($videoID);

            return view('admin.videos.edit', compact('video'));
        } catch (Exception $e) {
            return back()->with('error', 'Failed to retrieve video details.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->merge(['video_type' => 'embed']);
        $request->validate([
            'video_type' => 'required|in:file,embed',
            'video_url' => 'required|url',
            'thumbnail_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'description' => 'nullable|string',
            'sequence_no' => 'nullable|integer',
            'is_active' => 'nullable|in:0,1',
        ]);

        try {
            $video = Video::findOrFail($id);
            $video->video_type = $request->video_type;
            $video->description = $request->description;
            $video->sequence_no = $request->sequence_no;
            $video->is_active = $request->is_active ?? 0;

            if ($request->video_type === 'file') {
                if ($request->hasFile('video_path')) {
                    // Delete old file if exists and it was a file type
                    if ($video->video_path && !str_starts_with($video->video_path, 'http') && file_exists(public_path($video->video_path))) {
                        unlink(public_path($video->video_path));
                    }

                    $destinationPath = public_path('/videos/uploads');
                    if (! file_exists($destinationPath)) {
                        mkdir($destinationPath, 0755, true);
                    }
                    $fileName = time().'_'.$request->file('video_path')->getClientOriginalName();
                    $request->file('video_path')->move($destinationPath, $fileName);
                    $video->video_path = '/videos/uploads/'.$fileName;
                }
            } else {
                // If it was a local file previously, delete the local file
                if ($video->video_path && !str_starts_with($video->video_path, 'http') && file_exists(public_path($video->video_path))) {
                    unlink(public_path($video->video_path));
                }
                $video->video_path = $request->video_url;
            }

            /* ===== Update Thumbnail ===== */
            if ($request->hasFile('thumbnail_path')) {
                // Delete old thumbnail
                if ($video->thumbnail_path && file_exists(public_path($video->thumbnail_path))) {
                    unlink(public_path($video->thumbnail_path));
                }

                $thumbnailDestination = public_path('/videos/thumbnails');
                if (! file_exists($thumbnailDestination)) {
                    mkdir($thumbnailDestination, 0755, true);
                }
                $thumbName = time().'_'.$request->file('thumbnail_path')->getClientOriginalName();
                $request->file('thumbnail_path')->move($thumbnailDestination, $thumbName);
                $video->thumbnail_path = '/videos/thumbnails/'.$thumbName;
            }

            $video->save();

            return redirect()
                ->route('admin.videos.index')
                ->with('success', 'Video updated successfully.');

        } catch (Exception $e) {
            Log::error('Error updating video: '.$e->getMessage());
            return back()
                ->with('error', 'An error occurred while updating the video.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $videoID = decrypt($id);
            $video = Video::findOrFail($videoID);

            // Delete video file if exists
            if ($video->video_path && !str_starts_with($video->video_path, 'http') && file_exists(public_path($video->video_path))) {
                unlink(public_path($video->video_path));
            }
            // Delete thumbnail if exists
            if ($video->thumbnail_path && file_exists(public_path($video->thumbnail_path))) {
                unlink(public_path($video->thumbnail_path));
            }

            $video->delete();

            return redirect()->route('admin.videos.index')->with('success', 'Video deleted successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to delete video: '.$e->getMessage());
        }
    }
}
