<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin\Category;
use App\Models\Admin\Site;

use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Admin\Seo;
use App\Models\User;
use Image;





class HomeController extends Controller
{
  
    public function index()
    {
        $id=Auth::id();

        return view('home',[
            'categories'=>Category::all(),
            'orders'=>Order::where('user_id',$id)->with('order_detail')->get(),
            'seos'=>Seo::first(),
            'site_setting'=>Site::first(),

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
    public function userregister(){
        return view('user/register');
    }
    public function registerpost(Request $Request){
        $Request->validate([

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],


            ]);
      
            $data = new user();
            $data->name=$Request->name;
            $data->email=$Request->email;
            $data->password=Hash::make('password');

        if ($Request->image) {

            $uploaded_image=$Request->file('image');

            $image_name = hexdec(uniqid()).'.'.$uploaded_image->extension();
            Image::make($uploaded_image)->resize(100,100)->save(public_path('user_images/'.$image_name));
            $data->image=$image_name;
           
        }
        if($data->save())
            return redirect()->route('login')->with('message','your registration complete you can login now');

    }
    public function update_password(Request $Request){
        $password=Auth::user()->password;
        $old_password=$Request->old_password;
        $newpass=$Request->password;
        $confirm=$Request->password_confirmation;
    

        if(Hash::check($old_password,$password)){
           if($newpass === $confirm){
           $user_id=User::find(Auth::id());
           $user_id->password=Hash::make($newpass);
           $user_id->save();
           Auth::logout();
           return redirect()->route('login')->with('message','password updated Successfully yuo can login now');
           }
           else{
           return back()->with('message','new password and confirm passsword not same');

           }
        }
        else{
            return back()->with('message','old password not matched');
        } 
    }
    public function userprofileimageupdate(Request $Request,$id){
        if($Request->hasfile('image')){
            $uploaded_image=$Request->file('image');
            $image_newname=time().'.'.$uploaded_image->extension();
            $uploaded_image->move(public_path('user_images'),$image_newname);
        }

        $user=User::find($id);

        $user->update(['image'=>$image_newname]);
        return back()->with('message','user profile added Successfully');

    }

}
