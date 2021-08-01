<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Admin\Category;

class CheckoutController extends Controller
{
    // public function checkout(){
    //     return view('pages/checkout',[
    //         'cart'=>Cart::content(),
    //         'categories'=>Category::all(),
    //     ]);

    // }

public function checkout(Request $Request){

 

	  return view('pages/checkout',[
            'cart'=>Cart::content(),
            'categories'=>Category::all(),
            'carts'=>$Request->all(),

          
          
			
        ]);
}

public function payment(Request $Request){



    if($Request->payment == 1){
        echo "cash on";

    }
    elseif ($Request->payment == 2) {
        echo "bkash";
    }
    elseif ($Request->payment == 3) {
         return view('pages/stripe',[
            'categories'=>Category::all(),
            'order_details'=>$Request->all(),
        ]);
    }else{

        return back();
    }




die();




    // else{


    //     return view('pages/stripe',[
    //         'categories'=>Category::all(),
    //         'order_details'=>$Request->all(),
    //     ]);
    // }
        
        



}
}

