<?php

namespace App\Http\Controllers\Admin;

use App\Client_comment;
use App\Module;
use App\Partner;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $modules = Module::all();
        $teams = Team::all();
        $partners = Partner::all();
        $comments = Client_comment::all();
        return view('admin.dashboard',compact('teams','comments','partners','modules'));
    }
}
