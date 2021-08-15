<?php

namespace App\Http\Controllers\Admin\User_Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserroleController extends Controller
{
    public function createrole(){
    	return view('admin/user_role/create_role');
    }
    public function userrolestore(Request $Request){

    	$data=array();
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
    	DB::table('admins')->insert($data);

    	return back()->with('message','admin chaild inserted successfully');


    }
}
