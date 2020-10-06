<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class SettingsController extends Controller{
    public function index(){
        $info = User::all();
        return view('admin.settings', compact('info'));
    }
    public function update(Request $request){
        $val = Validator::make($request->all(),[
            'name'=>'string|required',
            'email'=>'string|required',
            'image'=>'image|mimes:jpg,jpeg,png'
            ,        ]);
        if ($val->fails()){
            Toastr::error('Invalid request','Error');
            return redirect()->back();
        }
        $image = $request->file('image');
        $info = User::first();
        if (isset($info->id)){
            if(isset($image)){

                $imagename = Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();

                //check category dir is exits
                if (!Storage::disk('public')->exists('admin')){
                    Storage::disk('public')->makeDirectory('admin');
                }

                //resize images for category and upload
                $category = Image::make($image)->resize(200,70)->stream();
                Storage::disk('public')->put('admin/'.$imagename,$category);
            }else{
                $imagename = $info->image;
            }
            $info->name = $request->name;
            $info->email = $request->email;
            $info->image = $imagename;
            $info->save();
            Toastr::success('Successfully updated','Success');
            return redirect()->back();

        }else{
            if(isset($image)){

                $imagename = Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();

                //check category dir is exits
                if (!Storage::disk('public')->exists('admin')){
                    Storage::disk('public')->makeDirectory('admin');
                }

                //resize images for category and upload
                $img = Image::make($image)->resize(200,70)->stream();
                Storage::disk('public')->put('admin/'.$imagename,$img);
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->image = $imagename;
                $user->save();
                Toastr::success('Successfully added','Success');
                return redirect()->back();
            }
            Toastr::error('Invalid request','Error');
            return redirect()->back();
        }
    }


    public function passwordUpdate( Request $request){
        Validator::make($request->all(),[
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
        //dd($request);
        $hashpassword = Auth::user()->password;
        if(Hash::check($request->old_password, $hashpassword)){
            if (!Hash::check($request->password,$hashpassword)){
                $user = User::find(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();
                $msg = "<span style='color:green;'>Success !<strong> Successfully change the password</strong></span>";
                return $msg;
            }else{
                $msg ="<span style='color:red;'>Error! <strong>New password cannot be the same as old password</strong></span>";
                return $msg;
            }
        }else{
            $msg ="<span style='color:red;'>Error! <strong>old password not match!!</strong></span>";
            return $msg;
        }
    }
}
