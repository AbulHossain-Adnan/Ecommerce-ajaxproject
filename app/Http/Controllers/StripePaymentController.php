<?php

   

namespace App\Http\Controllers;

   

use Illuminate\Http\Request;

use Session;

use Stripe;
use Cart;

   

class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe()

    {

        return view('stripe');

    }

  

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request)

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $request->subtotal * 100,

                "currency" => "BDT",

                "source" => $request->stripeToken,

                "description" => "Test payment from itsolutionstuff.com." 

        ]);

  			Cart::destroy();

        // Session::flash('success', 'Payment successful!');

          

        // return back();
        return redirect('/')->with('message',"Your Payment Successfully Done");

    }

}