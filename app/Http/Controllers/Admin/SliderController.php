<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index(){
        $info = Slider::all();
        return view('admin.addslider',compact('info'));
    }
    public function store(Request $request){
        //dd($request);
        $val = Validator::make($request->all(),[
            'title'=>'string|required',
            'description'=>'string|required',
            'image'=>'image|mimes:jpg,jpeg,png'
            ,        ]);
        if ($val->fails()){
            return redirect()->back()->withErrors($val)->withInput();
        }
        $image = $request->file('image');
            if(isset($image)){

                $imagename = Str::slug($request->title).uniqid().'.'.$image->getClientOriginalExtension();
                //dd($imagename);
                //check image dir is exits
                if (!Storage::disk('public')->exists('slider')){
                    Storage::disk('public')->makeDirectory('slider');
                }

                //resize images for category and upload
                $img = Image::make($image)->resize(1500,984)->stream();
                Storage::disk('public')->put('slider/'.$imagename,$img);
                $slider = new Slider();
                $slider->title = $request->title;
                $slider->description = $request->description;
                $slider->image = $imagename;
                $slider->save();
                Toastr::success('Successfully added','Success');
                return redirect()->back();
            }
            Toastr::error('Invalid request','Error');
            return redirect()->back();
        }
    public function slider(){
        $sliders = Slider::all();
        return view('admin.slider',compact('sliders'));
    }
    public function destroy($id){
        $slider = Slider::findOrFail($id);
        if (isset($slider->id)){
            if (Storage::disk('public')->exists('slider/'.$slider->image)){
                Storage::disk('public')->delete('slider/'.$slider->image);
            }
            $slider->delete();
            Toastr::success('Successfully deleted','Success');
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function edit($id){
        $slider = Slider::findOrFail($id);
        if (isset($slider->id)){
            return view('admin.editslider',compact('slider'));
        }
        return redirect()->back();
    }
    public function update(Request $request){
        $slider = Slider::findOrFail($request->slider_id);
        $image = $request->file('image');
        if (isset($image)){
            $imgName = Str::slug($request->title).uniqid().'.'.$image->getClientOriginalExtension();

            if (Storage::disk('public')->exists('slider/'.$slider->image)){
                Storage::disk('public')->delete('slider/'.$slider->image);
            }
            $img = Image::make($image)->resize(1850,984)->stream();
            Storage::disk('public')->put('slider/'.$imgName,$img);

        }
        $slider->title = $request->title;
        if (isset($imgName)){
            $slider->image = $imgName;
        }
        $slider->description = $request->description;
        $slider->save();
        Toastr::success('Successfully updated','Success');
        return redirect()->back();
    }

}
