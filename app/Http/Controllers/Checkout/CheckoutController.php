<?php

namespace App\Http\Controllers\Checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use App\Models\Admin\Category;

class CheckoutController extends Controller
{
    public function checkout(){
        return view('pages/checkout',[
            'cart'=>Cart::content(),
            'categories'=>Category::all(),
        ]);

    }
}
