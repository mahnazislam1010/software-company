<?php

namespace App\Http\Controllers\Admin;

use App\About_us;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AboutUsController extends Controller
{
    public function index(){
        $info = About_us::first();
        return view('admin.about_us',compact('info'));
    }
    public function update(Request $request){
        $val = Validator::make($request->all(),[
            'who_we_are'=>'string|required',
            'our_mission'=>'string|required',
            'our_vision'=>'string|required',
            'what_we_do'=>'string|required'
            ,        ]);
        if ($val->fails()){
            return redirect()->back()->withErrors($val)->withInput();
        }
        $info = About_us::first();
        if (isset($info->id)){
            $info->who_we_are = $request->who_we_are;
            $info->our_mission = $request->our_mission;
            $info->our_vision = $request->our_vision;
            $info->what_we_do = $request->what_we_do;
            $info->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();
        } else {
            $about = new About_us();
            $about->who_we_are = $request->who_we_are;
            $about->our_mission = $request->our_mission;
            $about->our_vision = $request->our_vision;
            $about->what_we_do = $request->what_we_do;
            $about->save();
            Toastr::success('Successfully added', 'Success');
            return redirect()->back();
        }
    }
}
