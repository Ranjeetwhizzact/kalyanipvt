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
        $request->validate([
            'video_path' => 'required|mimes:mp4,mov,avi,wmv|max:20480', // 20MB max
            'description' => 'nullable|string',
            'sequence_no' => 'nullable|integer',
            'is_active' => 'nullable|in:0,1',
        ]);

        try {

            $video = new Video;

            $video->description = $request->description;
            $video->sequence_no = $request->sequence_no;
            $video->is_active = $request->is_active ?? 0;

            /* ===== Video Upload ===== */
            if ($request->hasFile('video_path')) {

                $destinationPath = public_path('/videos/uploads');

                if (! file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }

                $fileName = time().'_'.$request->file('video_path')->getClientOriginalName();

                $request->file('video_path')->move($destinationPath, $fileName);

                $video->video_path = '/videos/uploads/'.$fileName;
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
        $request->validate([
            'video_path' => 'nullable|mimes:mp4,mov,avi,wmv|max:20480', // 20MB
            'description' => 'nullable|string',
            'sequence_no' => 'nullable|integer',
            'is_active' => 'nullable|in:0,1',
        ]);

        try {

            $video = Video::findOrFail($id);

            $video->description = $request->description;
            $video->sequence_no = $request->sequence_no;
            $video->is_active = $request->is_active ?? 0;

            /* ===== Update Video File ===== */
            if ($request->hasFile('video_path')) {

                // Delete old video if exists
                if ($video->video_path && file_exists(public_path($video->video_path))) {
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
            $video->delete();

            return redirect()->route('admin.videos.index')->with('success', 'Video deleted successfully.');
        } catch (Exception $e) {
            return back()->with('error', 'Failed to delete video: '.$e->getMessage());
        }
    }
}
