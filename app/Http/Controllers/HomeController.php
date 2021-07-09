<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Category;

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

        return view('home',[
            'categories'=>Category::all()

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
}
