<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adsmodel;
use Illuminate\Support\Facades\DB;

class AdsModelController extends Controller
{
    public function index()
    {
        $adsmodels = Adsmodel::orderBy('id', 'desc')->paginate(10);
        return view('admin.homepage-content.ads-model.index', ['adsmodels' => $adsmodels]);
    }

    public function create()
    {
        return view('admin.homepage-content.ads-model.create');
    }

    public function edit(Request $request, $id)
    {
        $adsmodel = Adsmodel::find(decrypt($id));
        return view('admin.homepage-content.ads-model.create', ['adsmodel' => $adsmodel]);
    }

    public function store(Request $req)
    {
        // Validation – only banner is required/optional
        $req->validate([
            'banner' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Find existing or create new model
        if (!empty($req->id)) {
            $adsmodel = Adsmodel::findOrFail($req->id);
        } else {
            $adsmodel = new Adsmodel();
        }

        // Handle banner upload
        if ($req->hasFile('banner')) {
            // Delete old banner if it exists (on update)
            if (!empty($req->id) && !empty($adsmodel->banner)) {
                $oldFile = public_path($adsmodel->banner);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            // Store new banner
            $fileName = time() . '_' . $req->file('banner')->getClientOriginalName();
            $destinationPath = public_path('adsmodels');
            $req->file('banner')->move($destinationPath, $fileName);
            $adsmodel->banner = '/adsmodels/' . $fileName;
        }

        // Always set status to active (adjust if needed)
        $adsmodel->status = 1;
        $adsmodel->save();

        // Redirect with appropriate message
        if (!empty($req->id)) {
            return redirect()->back()->with('success', 'Ads model updated successfully.');
        }

        return redirect()->back()->with('success', 'Ads model added successfully.');
    }

    public function destroy($id)
    {
        $adsmodel = Adsmodel::findOrFail(decrypt($id));

        // Optionally delete the banner file before deleting the record
        if (!empty($adsmodel->banner)) {
            $filePath = public_path($adsmodel->banner);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $adsmodel->delete();

        return redirect()->back()->with('success', 'Ads model deleted successfully.');
    }
}