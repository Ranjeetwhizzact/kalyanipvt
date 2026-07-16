<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\ContactMessage;

class NewsViewController extends Controller
{
    //
    public function newslist()
    {

        $news = News::orderBy('id', 'desc')->paginate(12);

        return view('news.newslist', ['news' => $news]);
    }

    public function newsdetail(Request $request)
    {
        $news = News::orderBy('id', 'desc')->paginate(12);

        $newsdetail = News::query()->where('slug', $request->slug)->firstOrFail();

        return view('news.newdetails', [
            'news' => $news,
            'newsdetail' => $newsdetail,
        ]);
    }

    public function contactus()
    {
        return view('contact');
    }

    public function storemessage(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'country'    => 'required',
            'phone'      => 'required',
            'message'    => 'required',
            'agree'      => 'accepted'
        ]);

        ContactMessage::create([
            'first_name' => $validated['first_name'],
            'last_name'  => $validated['last_name'],
            'email'      => $validated['email'],
            'country'    => $validated['country'],
            'phone'      => $validated['phone'],
            'message'    => $validated['message'],
            'agreed_to_policy' => true
        ]);

        return back()->with('success', 'Message sent successfully!');
    }
}
