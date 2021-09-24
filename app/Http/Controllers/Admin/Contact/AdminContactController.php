<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class AdminContactController extends Controller
{
 public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function contactmessage(){
    	return view('/admin/contact_message/index',[

    		'messages'=>Contact::OrderBy('id','DESC')->get()
    	]);
    }
}
