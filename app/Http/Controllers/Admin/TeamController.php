<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class TeamController extends Controller
{
    public function index(){
        $info = Team::all();
        return view('admin.addteam',compact('info'));
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
            if (!Storage::disk('public')->exists('team')){
                Storage::disk('public')->makeDirectory('team');
            }

            //resize images for category and upload
            $img = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('team/'.$imagename,$img);
            $team = new Team();
            $team->name = $request->name;
            $team->email = $request->email;
            $team->description = $request->description;
            $team->image = $imagename;
            $team->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();
        }
        Toastr::error('Invalid request','Error');
        return redirect()->back();
    }
    public function team(){
        $teams = Team::all();
        return view('admin.team',compact('teams'));
    }
    public function destroy($id){
        $team = Team::findOrFail($id);
        if (isset($team->id)){
            if (Storage::disk('public')->exists('team/'.$team->image)){
                Storage::disk('public')->delete('team/'.$team->image);
            }
            $team->delete();
            Toastr::success('Successfully deleted','Success');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
