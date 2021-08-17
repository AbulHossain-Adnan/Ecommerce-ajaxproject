<?php

namespace App\Http\Controllers\Admin\Coupon;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Admin\Category;
use Cart;
use Session;


class CouponController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function create(){
        return view('admin/coupon/index',[
            'coupons'=>Coupon::all()
        ]);
    }
    public function store(request $request){

        $request->validate([
            'coupon_name'=>'required',
            'coupon_discount'=>'required',
        ]);

        $data = new coupon();
        $data->coupon=$request->coupon_name;
        $data->discount=$request->coupon_discount;
        $data->save();
        return back()->with('message','data adden succesfully');
    }
    public function edit($id){

        $data=Coupon::findOrFail($id);
        return response()->json($data);


    }
    public function updated(request $request){
        $id=$request->id;
        $coupon=Coupon::find($id);
        $coupon->update([
            'coupon'=>$request->coupon_name,
            'discount'=>$request->coupon_discount
        ]);
       return back()->with('message',"coupon Update succesfully");
    }
    public function destroy($id){
        coupon::find($id)->delete();
        return back()->with('message','coupon delete succesfully');

    }
    public function coupon(request $request){
      
       
         $coupon=$request->coupon_name;
        $check=Coupon::where('coupon',$coupon)->first();
       

      if($check){
     
        session::put('coupon',[
            'name'=>$check->coupon,
            'discount'=>$check->discount,
            'balance'=>Cart::subtotal()-$check->discount,


            ]);
        return back()->with('message','coupon apply succefully');


      }
        else{
            return back()->with('message','invalid coupon');
        }

    }
    //   public function cartremove($rowId){
    //     Cart::remove($rowId);
       
       
           
    //        return back()->with('message','cart remove succefully');
        

    // }
}
