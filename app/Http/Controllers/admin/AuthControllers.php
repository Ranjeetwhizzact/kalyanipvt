<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class AuthControllers extends Controller
{
    //
    public function show()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $product = Product::where('title', '<>', null)->orderBy('id', 'desc')->paginate(15);
            return redirect()->route('dashboard')->with('success','login berhsil');
        }

        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }
 

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
