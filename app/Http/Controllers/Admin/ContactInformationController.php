<?php

namespace App\Http\Controllers\Admin;

use App\Contact_information;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactInformationController extends Controller
{
    public function index(){
        $info = Contact_information::first();
        return view('admin.contact-information',compact('info'));
    }
    public function update(Request $request){
        $val = Validator::make($request->all(),[
            'phone'=>'string|required',
            'email'=>'string|required',
            'location'=>'string|required',
            'map'=>'string|required'
            ,        ]);
        if ($val->fails()){
            Toastr::error('Invalid request','Error');
            return redirect()->back();
        }
        $info = Contact_information::first();
        if (isset($info->id)){
            $info->phone = $request->phone;
            $info->email = $request->email;
            $info->location = $request->location;
            $info->map = $request->map;
            $info->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();

        }else{
            $contactinfo = new Contact_information();
            $contactinfo->phone = $request->phone;
            $contactinfo->email = $request->email;
            $contactinfo->location = $request->location;
            $contactinfo->map = $request->map;
            $contactinfo->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();
            }
        }
}
