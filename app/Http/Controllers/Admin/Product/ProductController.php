<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use Image;
use DB;

class ProductController extends Controller
{
    public function index(){

        $products = DB::table('products')
                        ->join('categories','products.category_id','categories.id')
                        ->join('brands','products.brand_id','brands.id')  
                        ->select('products.*','categories.category_name','brands.brand_name')->get();

                       
                        return response()->json($products);  

        return view('admin.product.index',compact('products'));
        
    }
    public function create(){
        $categories =Category::all();
        $brands =Brand::all();
       
        return view('admin.product.create', compact('categories','brands'));

    }
    public function store(request $request){
        
        $validated = $request->validate([
            'Product_name' => 'required',
            'Product_code' => 'required',
            'Product_quantity' => 'required|integer',
            'product_size' => 'required',
            'Product_color' => 'required',
            'selling_price' => 'required|integer',
            'video_link' => 'required',
            'discount_price' => 'required',
            'status' => 'required',
            'product_details' => 'required',
            'image_one'=>'required|mimes:jpg,bmp,png',
            'image_two'=>'required|mimes:jpg,bmp,png',
            'image_three'=>'required|mimes:jpg,bmp,png',
        ]);
        $product = new product();
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->product_name=$request->Product_name;
        $product->product_code=$request->Product_code;
        $product->product_quantity=$request->Product_quantity;
        $product->product_details=$request->product_details;
        $product->product_color=$request->Product_color;
        $product->product_size=$request->product_size;
        $product->selling_price=$request->selling_price;
        $product->discount_price=$request->discount_price;
        $product->video_link=$request->video_link;
        $product->main_slider=$request->main_slider;
        $product->hot_deal=$request->hot_deal;
        $product->best_rated=$request->best_rated;
        $product->mid_slider=$request->product_name;
        $product->hot_new=$request->hot_new;
        $product->trend=$request->trend;    
         $image_one=$request->image_one;
         $image_two=$request->image_two;
         $image_three=$request->image_three;

        if($image_one && $image_two && $image_three)
        {
            // image_one
               $image_name1=hexdec(uniqid()).'.'.$image_one->extension();
               Image::make($image_one)->resize(300, 300)->save(public_path('product_images/'.$image_name1));
            
            // image_two
               $image_name2=hexdec(uniqid()).'.'.$image_two->extension();
              Image::make($image_two)->resize(300, 300)->save(public_path('product_images/'.$image_name2));
          
            // image_three
               $image_name3=hexdec(uniqid()).'.'.$image_three->extension();
               Image::make($image_three)->resize(300, 300)->save(public_path('product_images/'.$image_name3));
               $product->image_one=$image_name1;
               $product->iamge_two=$image_name2;
               $product->image_three=$image_name3;
        }
       $product->save();
        return back()->with('message','product created successfully');
    }
  
}
