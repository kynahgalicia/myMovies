<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\Mail;
use App\User;

class ContactFormController extends Controller
{
    public function create(){
        $user = User::all()->mapWithKeys(function($user) {
            return [$user['email']=>"$user[email]"];
        });
        return view('contact.create',compact('user'));
    }

    public function store_admin(){

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to('shekinahgalicia@gmail.com')->send(new ContactFormMail($data));

        return redirect('contact')->with('success','Your email has been sent!');
        
    }

    public function store_user(){

        // dd(request());
        $data = request()->validate([
            'email' => 'required|email',
            'message' => 'required'
        ]);

        Mail::to($data['email'])->send(new ContactFormMail($data));

        return redirect('contact')->with('success','Your email has been sent!');
        
    }


}
