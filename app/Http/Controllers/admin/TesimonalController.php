<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonal;

class TesimonalController extends Controller
{
    //
    public function index(){
        $test = Testimonal::where('is_active','active')->orderBy('id','desc')->paginate(15);
        return view('admin.testimonal.index',['test'=>$test]);
    }

    public function create(){
        return view('admin.testimonal.create');
    }
    public function edit($id){
        $test = Testimonal::find(decrypt($id));
        return view('admin.testimonal.create',['test'=>$test]);
    }
    public function store(Request $req){
        if($req->id){
            $test = Testimonal::find($req->id);
        }
        else{
            $test = new Testimonal;
        }
        if($req->image){
            $fileName = time() . $req->file('image')->getClientOriginalName();
            $destinationPath = public_path() . '/testimonal/';
            $req->file('image')->move($destinationPath, $fileName);
            $test->image = '/testimonal/' . $fileName; 
        }
        $test->name = $req->name;
        $test->occupation = $req->occupation;
        $test->message =$req->message;
        $test->date = $req->date;
        $test->is_active =$req->is_active;
        $test->save();
        if($req->id){
            return redirect()->back()->with('success','Testimonal is updated Successfully');
        }else{
            return redirect()->back()->with('success', 'Testimonal is Created Successfully');
        }

    }
    public function delete($id){
        $test = Testimonal::find(decrypt($id));
        $test->delete();
        return redirect()->back()->with("success"," testimonal is deleted successfuly");
    }
    // api
    public function gettestimonal(){
        $test = Testimonal::where('is_active','active')->orderBy('id','desc')->paginate(15);
           // Format the date for each news item
    $test->getCollection()->transform(function ($item) {
        $item->formatted_date = \Carbon\Carbon::parse($item->created_at)->format('d M Y');
        return $item;
    });

    return response()->json($test);

    }
}
