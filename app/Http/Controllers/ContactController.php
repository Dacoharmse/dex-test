<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'country_code' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $data = array(
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone_number' => "+$request->country_code $request->phone_number",
            'subject' => $request->subject,
            'message' => $request->message,
        );

        Mail::send(new Contact($data));

        return redirect()->route('home')->with('success', 'Thanks for contacting us, we will get back to you shortly !');
    }
}
