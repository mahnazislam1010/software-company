<?php

namespace App\Http\Controllers\Admin;

use App\Social;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SocialController extends Controller
{
    public function social(){
        $socials = Social::first();
        return view('admin.social',compact('socials'));
    }
    public function update(Request $request){
        $val = Validator::make($request->all(),[
            'facebook'=>'string|required',
            'twitter'=>'string|required',
            'instagram'=>'string|required',
            'youtube'=>'string|required',
            'linkedin'=>'string|required',
            'skype'=>'string|required'
            ,        ]);
        if ($val->fails()){
            Toastr::error('Invalid request','Error');
            return redirect()->back();
        }
        $info = Social::first();
        if (isset($info->id)){
            $info->facebook = $request->facebook;
            $info->twitter = $request->twitter;
            $info->instagram = $request->instagram;
            $info->youtube = $request->youtube;
            $info->linkedin = $request->linkedin;
            $info->skype = $request->skype;
            $info->save();
            Toastr::success('Successfully updated','Success');
            return redirect()->back();

        }else{
            $socialinfo = new Social();
            $socialinfo->facebook = $request->facebook;
            $socialinfo->twitter = $request->twitter;
            $socialinfo->instagram = $request->instagram;
            $socialinfo->youtube = $request->youtube;
            $socialinfo->linkedin = $request->linkedin;
            $socialinfo->skype = $request->skype;
            $socialinfo->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();
        }
    }
}
