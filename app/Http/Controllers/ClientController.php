<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('client',compact('partners'));
    }
}
