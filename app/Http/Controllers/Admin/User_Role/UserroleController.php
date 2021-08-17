<?php

namespace App\Http\Controllers\Admin\User_Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\Admin;

class UserroleController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function createrole(){
    	return view('admin/user_role/create_role');
    }
    public function userrolestore(Request $Request){


    	$data=array();
    	$data['name']= $Request->name;
    	$data['email']= $Request->email;
    	$data['password']=bcrypt($Request->password);
    	$data['product']= $Request->product;
    	$data['category']= $Request->category;
    	$data['coupon']= $Request->coupon;
    	$data['division']= $Request->division;
    	$data['orders']= $Request->orders;
    	$data['seo']= $Request->seo;
    	$data['reports']= $Request->report;
    	$data['return_order']= $Request->return_order;
    	$data['contact_message']= $Request->contact_msg;
    	$data['product_comment']= $Request->product_comment;
    	$data['site_setting']= $Request->site_setting;
    	$data['type']=2;
    	DB::table('admins')->insert($data);

    	return back()->with('message','admin chaild inserted successfully');


    }
    public function alluserroll(){

    	return view('admin/user_role/all_user',[

    		'users'=>Admin::where('type',2)->get(),
    	]);
    
    
}
public function useredit($id){
	return view('admin/user_role/edit',[
		'users'=>Admin::find($id),
	]);
}
public function userupdate(Request $Request ,$id){
	$data=Admin::find($id);
    	$data['name']= $Request->name;
    	$data['email']= $Request->email;
    	$data['password']=Hash::make($Request->name);
    	$data['product']= $Request->product;
    	$data['category']= $Request->category;
    	$data['coupon']= $Request->coupon;
    	$data['division']= $Request->division;
    	$data['orders']= $Request->orders;
    	$data['seo']= $Request->seo;
    	$data['reports']= $Request->report;
    	$data['return_order']= $Request->return_order;
    	$data['contact_message']= $Request->contact_msg;
    	$data['product_comment']= $Request->product_comment;
    	$data['site_setting']= $Request->site_setting;
    	$data['type']=2;
    	$data->update();

    	return redirect()->route('alluser.role')->with('message','admin chaild updated successfully');

}
public function userdelete($id){

	Admin::find($id)->delete();
return back()->with('message','user deleted successfully');

}
}
