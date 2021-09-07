<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Validator;

class NewsLetterController extends Controller
{
	

    public function addnewsletter(Request $Request){




    	 $validator = Validator::make($Request->all(), [
            'newsletter' => 'required|email',
           
        ]);
 if ($validator->fails()) {
            return \Response()->json(['error'=>'enter valid email']);
        }


$check=Newsletter::where('email',$Request->newsletter)->first();



if(Auth::check()){

	if($check){
  return \Response()->json(['error'=>'You already subcrived']);
	}
Newsletter::insert(['user_id'=>Auth::id(),'email'=>$Request->newsletter]);
  return \Response()->json(['success'=>'Thank you for Subscribe']);
}
else{
	  return \Response()->json(['error'=>'you are not loged in']);
}









}



}
    	

 

