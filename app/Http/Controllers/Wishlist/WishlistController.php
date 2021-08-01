<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wishlist;
use App\Models\Admin\Category;

class WishlistController extends Controller
{
        public function addwishlist($id){
        $user_id=Auth::id();
        $check=Wishlist::where('user_id',$user_id)->where('product_id',$id)->first();

if(Auth::check()){
    if($check){
         return \Response()->json(['error'=>'this product is already in wishlist']);

    }
    else{
          Wishlist::insert([

            'user_id'=>$user_id,
            'product_id'=>$id

        ]);
      return \Response()->json(['success'=>'Wishlist added succefully']);


    }
  
}
  else{
         return \Response()->json(['error'=>'you are not loged in']);

    }

    }
    public function wishlist(){

        $id=Auth::id();
    

        return view('pages/wishlist',[
            'categories'=>Category::all(),
            'wishlists'=>Wishlist::with('product')->where('user_id',$id)->get(),

    ]);

        

    }



public function wishlistt($id){


   $user_id=Auth::id();
        $check=Wishlist::where('user_id',$user_id)->where('product_id',$id)->first();

if(Auth::check()){
    if($check){
         return \Response()->json(['error'=>'this product is already in wishlist']);

    }
    else{
          Wishlist::insert([

            'user_id'=>$user_id,
            'product_id'=>$id

        ]);
      return \Response()->json(['success'=>'Wishlist added succefully']);


    }
  
}
  else{
         return \Response()->json(['error'=>'you are not loged in']);

    }


}
public function miniwishlist(){
  $user_id=Auth::id();

  $wishlist=Wishlist::where('user_id',$user_id)->get();


if($wishlist){


  return Response()->json(array(

'wishlist'=>count($wishlist)

  ));
  
}



  
}

}







        







       

    

