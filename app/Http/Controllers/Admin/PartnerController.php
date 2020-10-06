<?php

namespace App\Http\Controllers\Admin;

use App\Partner;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PartnerController extends Controller
{
    public function index(){
        $info = Partner::first();
        return view('admin.addpartner',compact('info'));
    }
    public function store(Request $request){
        //dd($request);
        $val = Validator::make($request->all(),[
            'name'=>'string|required',
            'description'=>'string|required',
            'image'=>'image|mimes:jpg,jpeg,png'
            ,        ]);
        if ($val->fails()){
            return redirect()->back()->withErrors($val)->withInput();
        }
        $image = $request->file('image');
        if(isset($image)){

            $imagename = Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();
            //dd($imagename);
            //check image dir is exits
            if (!Storage::disk('public')->exists('partner')){
                Storage::disk('public')->makeDirectory('partner');
            }

            //resize images for category and upload
            $img = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('partner/'.$imagename,$img);
            $partner = new Partner();
            $partner->name = $request->name;
            $partner->description = $request->description;
            $partner->image = $imagename;
            $partner->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();
        }
        Toastr::error('Invalid request','Error');
        return redirect()->back();
    }
    public function partner(){
        $partners = Partner::all();
        return view('admin.partner',compact('partners'));
    }
    public function destroy($id){
        $partner = Partner::findOrFail($id);
        if (isset($partner->id)){
            if (Storage::disk('public')->exists('partner/'.$partner->image)){
                Storage::disk('public')->delete('partner/'.$partner->image);
            }
            $partner->delete();
            Toastr::success('Successfully deleted','Success');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
