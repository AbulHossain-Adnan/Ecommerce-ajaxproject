<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Admin\Category;
use App\Models\Admin\Division;
use App\Models\Admin\District;
use App\Models\Admin\Area;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Shipping;

use Auth;
use Carbon\Carbon;



class CheckoutController extends Controller
{
   

public function checkout(Request $Request){

	  return view('pages/checkout',[
            'cart'=>Cart::content(),
            'categories'=>Category::all(),
            'carts'=>$Request->all(),
            'divisions'=>Division::all(),

          
          
			
        ]);
}
 public function __construct()
    {
        $this->middleware('auth');
    }

public function payment(Request $Request){

    if($Request->payment == "cash_on"){
          Order::insert([
                'user_id'=>Auth::id(),
                'payment_type'=>$Request->payment,
                // 'blnc_transection'=>$request->null,
                'subtotal'=>Cart::subtotal(),
                'discount'=>$Request->discount,
                'paying_amount'=>$Request->subtotal,
                'shipping'=>0,
                'vat'=>0,
                'date'=>Carbon::now(),
            ]);
            foreach (Cart::content() as $value) {
            
            Order_detail::insert([
                'user_id'=>Auth::id(),
                'product_id'=>$value->id,
                'color'=>$value->options->color,
                'size'=>$value->options->size,
                'quantity'=>$value->qty,
                'price'=>$value->price,
                'subtotal'=>$value->price*$value->qty,
                'shipping'=>50,
                'vat'=>50,
                
            ]);
}


$division_id=$Request->division_id;
$district_id=$Request->district_id;
$area_id=$Request->area_id;

$division_name=Division::find($division_id);
$district_name=District::find($district_id);
$area_name=Area::find($area_id);


    Shipping::insert([

        'user_id'=>Auth::id(),
        'division'=>$division_name->division,
        'district'=>$district_name->district,
        'area'=>$area_name->area,
        'zip'=>$Request->zip,
        'address'=>$Request->adress,

        ]);
          
Cart::destroy();
       
        return redirect('/')->with('message',"Your Payment Successfully Done");

    }
    elseif ($Request->payment == "bkash") {
          Order::insert([
                'user_id'=>Auth::id(),
                'payment_type'=>$Request->payment,
                'blnc_transection'=>$Request->stripeToken,
                'paying_amount'=>$Request->subtotal,
                'shipping'=>0,
                'vat'=>0,
                'date'=>Carbon::now(),
            ]);
            foreach (Cart::content() as $value) {
            
            Order_detail::insert([
                'user_id'=>Auth::id(),
                'product_id'=>$value->id,
                'color'=>$value->options->color,
                'size'=>$value->options->size,
                'quantity'=>$value->qty,
                'price'=>$value->price,
                'subtotal'=>$value->price*$value->qty,
                'shipping'=>50,
                'vat'=>50,
                
            ]);
}
   $division_id=$Request->division_id;
$district_id=$Request->district_id;
$area_id=$Request->area_id;

$division_name=Division::find($division_id);
$district_name=District::find($district_id);
$area_name=Area::find($area_id);


    Shipping::insert([

        'user_id'=>Auth::id(),
        'division'=>$division_name->division,
        'district'=>$district_name->district,
        'area'=>$area_name->area,
        'zip'=>$Request->zip,
        'address'=>$Request->adress,

        ]);       
Cart::destroy();
       
        return redirect('/')->with('message',"Your Payment Successfully Done");
    }
    elseif ($Request->payment == "stripe") {
         return view('pages/stripe',[
            'categories'=>Category::all(),
            'order_details'=>$Request->all(),
        ]);
    }else{

        return back();
    }
}
}
