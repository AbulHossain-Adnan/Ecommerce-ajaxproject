<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Category;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Seo;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=Auth::id();

        return view('home',[
            'categories'=>Category::all(),
            'orders'=>Order::where('user_id',$id)->with('order_detail')->get(),
            'seos'=>Seo::first(),

        ]);
    }

    public function logout()
    {
        Auth::logout();
        $data = array(
            'message'    => 'Logout Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($data);
    }
    public function change_password(){
        return view('auth/changePassword');
    }
    public function orderdetail($order_id){
     
        $id=Auth::id();
      

        return view('user/order_detail',[
            'orders'=>Order::where('user_id',$id)->where('id',$order_id)->first(),
            'order_details'=>Order_detail::where('order_id',$order_id)->get(),
             'categories'=>Category::all(),

            

        ]);
    }
}
