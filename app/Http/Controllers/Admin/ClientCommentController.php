<?php

namespace App\Http\Controllers\Admin;

use App\Client_comment;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class ClientCommentController extends Controller
{
    public function comment(){
        $comments = Client_comment::all();
        return view('admin.client-comment',compact('comments'));
    }
    public function destroy($id){
        $comment = Client_comment::findOrFail($id);
        if (isset($comment->id)){
            $comment->delete();
            Toastr::success('Successfully deleted','Success');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
