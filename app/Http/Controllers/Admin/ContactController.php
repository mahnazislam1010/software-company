<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function contact(){
        $contacts = Contact::all();
        return view('admin.contact',compact('contacts'));
    }
    public function destroy($id){
        $contact = Contact::findOrFail($id);
        if (isset($contact->id)){
            $contact->delete();
            Toastr::success('Successfully deleted','Success');
            return redirect()->back();
        }
        return redirect()->back();
    }
}
