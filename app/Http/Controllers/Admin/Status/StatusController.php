<?php

namespace App\Http\Controllers\Admin\Status;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class StatusController extends Controller
{

    public function active($id){
       $product = Product::find($id);

        if($product->status =='1'){
           $product->update([
            'status'=>'0'
           ]);
            
            
            return back()->with('message','status updated successfully');
        }
      
    }
     public function deactive($id){
        $product = Product::find($id);

        if($product->status == '0'){
           
            
           $product->update([
            'status'=>'1'

           ]);
            return back()->with('message','status updated successfully');

        }
        
        
    }
}
