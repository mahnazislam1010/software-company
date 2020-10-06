<?php

namespace App\Http\Controllers\Admin;

use App\Advisory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdvisoryController extends Controller
{
    public function index(){
        $info = Advisory::all();
        return view('admin.addadvisory',compact('info'));
    }
    public function store(Request $request){
        //dd($request);
        $val = Validator::make($request->all(),[
            'name'=>'string|required',
            'email'=>'string|required',
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
            if (!Storage::disk('public')->exists('advisory')){
                Storage::disk('public')->makeDirectory('advisory');
            }

            //resize images for category and upload
            $img = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('advisory/'.$imagename,$img);
            $advisory = new Advisory();
            $advisory->name = $request->name;
            $advisory->email = $request->email;
            $advisory->description = $request->description;
            $advisory->image = $imagename;
            $advisory->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();
        }
        Toastr::error('Invalid request','Error');
        return redirect()->back();
    }
    public function advisory(){
        $advisorys = Advisory::all();
        return view('admin.advisory',compact('advisorys'));
    }
    public function destroy($id){
        $advisory = Advisory::findOrFail($id);
        if (isset($advisory->id)){
            if (Storage::disk('public')->exists('advisory/'.$advisory->image)){
                Storage::disk('public')->delete('advisory/'.$advisory->image);
            }
            $advisory->delete();
            Toastr::success('Successfully deleted','Success');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
