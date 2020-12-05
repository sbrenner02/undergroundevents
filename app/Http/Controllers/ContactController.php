<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    function sendMessage(Request $request)
        //Basic contact form message for site admin
    {
        //Validate Data
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
        ]);
        //Compile data for email
        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message,
            'email' => $request->email
        );

        Mail::to('brennerdigitalmedia@gmail.com')->send(new SendMail($data));
        return back()->with('confirm_message', 'Your message has been received!');
    }
}
