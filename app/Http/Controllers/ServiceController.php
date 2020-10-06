<?php

namespace App\Http\Controllers;

use App\Module;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $modules = Module::all();
        return view('service',compact('modules'));
    }
}
