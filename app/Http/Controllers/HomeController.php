<?php

namespace App\Http\Controllers;


use App\Module;
use App\Partner;
use App\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $modules = Module::latest()->take(4)->get();
        $partners = Partner::latest()->take(4)->get();
        return view('home',compact('sliders','modules','partners'));
    }
}
