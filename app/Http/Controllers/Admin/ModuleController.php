<?php

namespace App\Http\Controllers\Admin;

use App\Module;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ModuleController extends Controller
{
    public function index(){
        $info = Module::first();
        return view('admin.addmodule',compact('info'));
    }
    public function store(Request $request){
        $val = Validator::make($request->all(),[
            'name'=>'string|required',
            'image'=>'image|mimes:jpg,jpeg,png'
            ,        ]);
        if ($val->fails()){
            return redirect()->back()->withErrors($val)->withInput();
        }
        $image = $request->file('image');
        if(isset($image)){
            $imagename = Str::slug($request->name).uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('module')){
                Storage::disk('public')->makeDirectory('module');
            }

            //resize images for category and upload
            $img = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('module/'.$imagename,$img);
            $module = new Module();
            $module->name = $request->name;
            $module->image = $imagename;
            $module->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();
        }
        Toastr::error('Invalid request','Error');
        return redirect()->back();
    }
    public function module(){
        $modules = Module::all();
        return view('admin.module',compact('modules'));
    }
    public function destroy($id){
        $module = Module::findOrFail($id);
        if (isset($module->id)){
            if (Storage::disk('public')->exists('module/'.$module->image)){
                Storage::disk('public')->delete('module/'.$module->image);
            }
            $module->delete();
            Toastr::success('Successfully deleted','Success');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
