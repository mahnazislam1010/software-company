<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Contact_information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index()
    {
        $info = Contact_information::first();
        return view('contact', compact('info'));
    }
    public function store(Request $request){
       $val= Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email',
            'message'=>'required|string',
        ]);
        if ($val->fails()){
            return response()->json('Invalid request',200);
        }
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->description = $request->message;
        $contact->save();
        return response()->json('Successfully sent the message. Thank you for contacting with us!');
    }
}
