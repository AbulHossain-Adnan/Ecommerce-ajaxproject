<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Coupon;
use Cart;
use Session;
use App\Models\Admin\Category;


class CartController extends Controller
{
    public function addcart($id){

        $product =Product::find($id)->where('id',$id)->first();
        $data=array();
        if($product->discount_price == null){
           
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']=$product->selling_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']='';
             $data['options']['size']='';
            cart::add($data);
            return Response()->json(['success'=>'product added succefully']);



        }else{
              $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']=$product->discount_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
             $data['options']['color']='';
             $data['options']['size']='';
            cart::add($data);
            return Response()->json(['success'=>'product added succefully']);
             
        }


    }
    public function check(){
        $content=Cart::content();
        return Response()->json($content);
    }
    public function cart_show(){
        $cart=Cart::content();
        $categories=Category::all();
       

        return view('pages/cart',compact('cart','categories'));
     
    }
    public function cartremove($rowId){
        Cart::remove($rowId);
           return back()->with('message','cart remove succefully');  

    }
    public function cartupdate(Request $request){
        $rowId=$request->product_id;
        $qty=$request->qty;
        Cart::update($rowId, $qty);
        return redirect()->back()->with('message','cart updated successfully');




       


    }
    public function addtocart(Request $request){

        $id=$request->product_id;


                $product =Product::find($id)->where('id',$id)->first();
                 $quantity=$request->qty;
                 $color=$request->color;
                 $size= $request->size;

        $data=array();
        if($product->discount_price == null){
           
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$quantity;
            $data['price']=$product->selling_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']=$request->color;
             $data['options']['size']=$request->size;
            cart::add($data);
        
          $notification=array(
                'message'=>'Product Added To Cart succefully',
                'alert-type'=>'success'

            );
           
           
            return redirect()->back()->with($notification);
          


        }else{
              $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$quantity;
            $data['price']=$product->discount_price;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
             $data['options']['color']=$request->color;
             $data['options']['size']=$request->size;
            cart::add($data);
  
            
            $notification=array(
                'message'=>'Product Added To Cart succefully',
                'alert-type'=>'success'

            );
           
           
            return redirect()->back()->with($notification);

             
        }
       
    }
    public function couponcartremove($rowId){
      
        Cart::remove($rowId);
        return back();
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
    public function alldata(){
        $data=Cart::content();
        return Response()->json($data);
    }

    public function increment(request $request){

        $data=$request->all();
        return Response()->json($data);
        
    }
}
           

