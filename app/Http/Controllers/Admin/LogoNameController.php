<?php

namespace App\Http\Controllers\Admin;

use App\Logo_name;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class LogoNameController extends Controller
{
    public function index(){
        $info = Logo_name::first();
        return view('admin.logoandname',compact('info'));
    }
    public function update(Request $request){
        $val = Validator::make($request->all(),[
            'name'=>'string|required',
            'logo'=>'image|mimes:jpg,jpeg,png'
,        ]);
        if ($val->fails()){
            Toastr::error('Invalid request','Error');
            return redirect()->back();
        }
        $image = $request->file('logo');
        $info = Logo_name::first();
        if (isset($info->id)){
            if(isset($image)){

                $imagename = Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();

                //check category dir is exits
                if (!Storage::disk('public')->exists('logo')){
                    Storage::disk('public')->makeDirectory('logo');
                }

                //resize images for category and upload
                $category = Image::make($image)->resize(200,70)->stream();
                Storage::disk('public')->put('logo/'.$imagename,$category);
            }else{
                $imagename = $info->logo;
            }
            $info->name = $request->name;
            $info->logo = $imagename;
            $info->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();

        }else{
            if(isset($image)){

                $imagename = Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();

                //check category dir is exits
                if (!Storage::disk('public')->exists('logo')){
                    Storage::disk('public')->makeDirectory('logo');
                }

                //resize images for category and upload
                $img = Image::make($image)->resize(200,70)->stream();
                Storage::disk('public')->put('logo/'.$imagename,$img);
                $logoname = new Logo_name();
                $logoname->name = $request->name;
                $logoname->logo = $imagename;
                $logoname->save();
                Toastr::success('Successfully added','Success');
                return redirect()->back();
            }
            Toastr::error('Invalid request','Error');
            return redirect()->back();
        }

    }
}
