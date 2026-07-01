<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    //
    public function dashboard(Request $req){
        $product = Product::where('title', '<>', null)->orderBy('id', 'desc')->paginate(15);
        return view('admin.dashboard', ["product" =>$product]);
       
    }
}
