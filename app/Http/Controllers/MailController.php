<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\ContactFormConfirmationMail;
use App\Mail\ContactFormMail;

class MailController extends Controller
{
    //
    public function storecontactinfo(Request $request){
   $data = $request->validate([
        'first_name' => 'required|string',
        'last_name'  => 'required|string',
        'email'      => 'required|email',
        'phone'      => 'nullable|string',
        'country'    => 'nullable|string',
        'message'    => 'required|string',
    ]);

    // 1️⃣ Send to site owner
    Mail::to('ranjeetpoojari77@gmail.com')->send(new ContactFormMail($data));

    // 2️⃣ Send confirmation to user
    Mail::to($data['email'])->send(new ContactFormConfirmationMail($data));

    return response()->json([
        'message' => 'Your message has been sent successfully!'
    ]);       Mail::to('')->send(new ContactFormMail($data));

    return response()->json([
        'message' => 'Your message has been sent successfully!'
    ]);

    }
}
