<?php

namespace App\Http\Controllers;

use App\Client_comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function index()
    {
        $comments = Client_comment::all();
        return view('blog',compact('comments'));
    }
    public function store(Request $request){
        $val= Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email',
            'comment'=>'required|string',
        ]);
        if ($val->fails()){
            return response()->json('Invalid request',200);
        }
        $comment = new Client_comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();
        return response()->json('Successfully sent the Comment. Thank you for your comment!');
    }
}
