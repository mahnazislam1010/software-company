<?php

namespace App\Http\Controllers;

use App\About_us;
use App\Partner;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $about = About_us::first();
        $clients = Partner::all();
        return view('about',compact('about','clients'));
    }
}
