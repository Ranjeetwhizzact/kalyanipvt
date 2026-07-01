<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    
    //
    public function index(){
        $news = News::where('is_active','active')->orderBy('id','desc')->paginate(15);
        return view('admin.news.index',['news'=>$news]);
    }
    public function create(){
        return view('admin.news.create');
    }
    public function edit($id){
        $news = News::find(decrypt($id));
        return view('admin.news.create',['news'=>$news]);
    } 
    public function store(Request $req){
        if($req->id){
            $news = News::find($req->id);
        }else{
            $news = new News;
        }
        if($req->image){
            $fileName =time(). $req->file('image')->getClientOriginalName();
            $destnationpath = public_path() . '/News/';
            $req->file('image')->move($destnationpath, $fileName);
            $news->image = '/News/'.$fileName;
        }
        $news->title=$req->title;
        $news->section_type = $req->section_type;
        $slug = preg_replace('/[^a-z0-9\-\.]+/i', '-', $req->title);
$news->slug = strtolower(trim($slug, '-'));
        $news->description=$req->description;
        $news->date =$req->date;
        $news->is_active = $req->is_active;
        $news->save();
        if($req->id){
            return redirect()->back()->with('success','New is upadted successfully');
        }else{
            return redirect()->back()->with('success','New is created successfully');
        }
       
    }
    public function delete($id){
        $news = News::find(decrypt($id));
        if($news){
            $news->delete();
        }
        return redirect()->back()->with('success','News is deleted');
    }
    public function getnews(){
        $news = News::where('is_active','active')->orderBy('id','desc')->paginate(15);
        // Format the date for each news item
        $news->getCollection()->transform(function ($item) {
            $item->formatted_date = \Carbon\Carbon::parse($item->created_at)->format('d M Y');
            return $item;
        });
    
        return response()->json($news);
    
    }
}

