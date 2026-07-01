<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adsmodel  ;
use Illuminate\Support\Facades\DB;

class AdsModelController extends Controller
{
    //
    public function index(){
     $adsmodels = Adsmodel::orderBy('id', 'desc')->paginate(10);
        // dd($category);
       return view('admin.homepage-content.ads-model.index',['adsmodels'=>$adsmodels]);
    }
    public function create(){
        return view('admin.homepage-content.ads-model.create');
    }
    public function edit(Request $request,$id){
        $adsmodel = Adsmodel::find(decrypt($id));
        return view('admin.homepage-content.ads-model.create',['adsmodel'=>$adsmodel]);
    }
public function store(Request $req)
{
    if (!empty($req->id)) {
        $adsmodel = Adsmodel::findOrFail($req->id);
    } else {
        $adsmodel = new Adsmodel();
    }

    if ($req->hasFile('banner')) {

        // Delete old banner while updating
        if (!empty($req->id) && !empty($adsmodel->banner)) {
            $oldFile = public_path($adsmodel->banner);

            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        $fileName = time() . '_' . $req->file('banner')->getClientOriginalName();
        $destinationPath = public_path('adsmodels');

        $req->file('banner')->move($destinationPath, $fileName);

        $adsmodel->banner = '/adsmodels/' . $fileName;
    }

    $adsmodel->status = $req->status;
    $adsmodel->save();

    if (!empty($req->id)) {
        return redirect()->back()->with('success', 'Ads model updated successfully.');
    }

    return redirect()->back()->with('success', 'Ads model added successfully.');
}
public function destroy($id)
{
    $adsmodel = Adsmodel::findOrFail(decrypt($id));

    $adsmodel->delete();

    return redirect()->back()
        ->with('success', 'Ads model deleted successfully.');
}
}
