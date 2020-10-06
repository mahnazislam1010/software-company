<?php

namespace App\Http\Controllers\Admin;

use App\Seo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SeoController extends Controller
{
    public function index(){
        $info = Seo::first();
        return view('admin.seo',compact('info'));
    }
    public function update(Request $request){
        $val = Validator::make($request->all(),[
            'pagename'=>'string|required',
            'content'=>'string|required',
            'tags'=>'string|required'
            ,        ]);
        if ($val->fails()){
            Toastr::error('Invalid request','Error');
            return redirect()->back();
        }
        $info = Seo::first();
        if (isset($info->id)){
            $info->pagename = $request->pagename;
            $info->content = $request->content;
            $info->tags = $request->tags;
            $info->save();
            Toastr::success('Successfully updated','Success');
            return redirect()->back();
        }else{
            $seoinfo = new Seo();
            $seoinfo->pagename = $request->pagename;
            $seoinfo->content = $request->content;
            $seoinfo->tags = $request->tags;
            $seoinfo->save();
            Toastr::success('Successfully added','Success');
            return redirect()->back();
        }
    }
}
