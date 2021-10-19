<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Seo;
use App\Models\Admin\Site;
use App\Models\Sub_category;
use Image;
use DB;

class ProductController extends Controller
{

   
    public function index(){
        $brands=Brand::all();
        $categories=Category::all();
        $product=DB::table('products')
                        ->join('categories','products.category_id','categories.id')
                        ->join('brands','products.brand_id','brands.id')  
                        ->select('products.*','categories.category_name','brands.brand_name')->get();
  

        return view('admin.product.index',compact('brands','categories','product'));
        
    }
    public function create(){
        $data = DB::table('products')
                        ->join('categories','products.category_id','categories.id')
                        ->join('brands','products.brand_id','brands.id')  
                        ->select('products.*','categories.category_name','brands.brand_name')->get();
      
       return response()->json($data);




        
       
        return view('admin.product.create', compact('categories','brands'));

    }
    public function store(request $request){ 

        $product = new product();
        $product->category_id=$request->input('category_id');
        $product->subcategory_id=$request->input('subcategory_id');
        $product->brand_id=$request->input('brand_id');
        $product->product_name=$request->input('Product_name');
        $product->product_code=$request->input('Product_code');
        $product->product_quantity=$request->input('Product_quantity');
        $product->product_details=$request->input('product_details');
        $product->product_color=$request->input('Product_color');
        $product->product_size=$request->input('product_size');
        $product->selling_price=$request->input('selling_price');
        $product->discount_price=$request->input('discount_price');
        $product->video_link=$request->input('video_link');
        $product->main_slider=$request->input('main_slider');
        $product->hot_deal=$request->input('hot_deal');
        $product->best_rated=$request->input('best_rated');
        $product->mid_slider=$request->input('mid_slider');
        $product->hot_new=$request->input('hot_new');
        $product->trend=$request->input('trend');
        $product->byeonegetone=$request->input('byeonegetone');    
        $image_one=$request->file('image_one');
        $image_two=$request->file('image_two');
        $image_three=$request->file('image_three');
        if($image_one){
            // image_one
            $image_name1=hexdec(uniqid()).'.'.$image_one->extension();
            Image::make($image_one)->resize(521, 459)->save(public_path('product_images/'.$image_name1));
            $product->image_one=$image_name1;
      }
      if($image_two){
            // image_two
            $image_name2=hexdec(uniqid()).'.'.$image_two->extension();
            Image::make($image_two)->resize(521, 459)->save(public_path('product_images/'.$image_name2));
            $product->image_two=$image_name2;
      }
      if($image_three){
            // image_three
            $image_name3=hexdec(uniqid()).'.'.$image_three->extension();
            Image::make($image_three)->resize(521, 459)->save(public_path('product_images/'.$image_name3));
            $product->image_three=$image_name3;
      }
       $product->save();
       return response()->json(['success'=>'sdfs']);
        
    }
 public function updated(request $request){ 
        $product =Product::find($request->input('id'));
        $product->category_id=$request->input('category_id');
        $product->subcategory_id=$request->input('subcategory_id');
        $product->brand_id=$request->input('brand_id');
        $product->product_name=$request->input('Product_name');
        $product->product_code=$request->input('Product_code');
        $product->product_quantity=$request->input('Product_quantity');
        $product->product_details=$request->input('product_details');
        $product->product_color=$request->input('Product_color');
        $product->product_size=$request->input('product_size');
        $product->selling_price=$request->input('selling_price');
        $product->discount_price=$request->input('discount_price');
        $product->video_link=$request->input('video_link');
        $product->main_slider=$request->input('main_slider');
        $product->hot_deal=$request->input('hot_deal');
        $product->best_rated=$request->input('best_rated');
        $product->mid_slider=$request->input('mid_slider');
        $product->hot_new=$request->input('hot_new');
        $product->trend=$request->input('trend');
        $product->byeonegetone=$request->input('byeonegetone');    
        $image_one=$request->file('image_one');
        $image_two=$request->file('image_two');
        $image_three=$request->file('image_three');
        if($image_one){
            // image_one
            $image_name1=hexdec(uniqid()).'.'.$image_one->extension();
            Image::make($image_one)->resize(521, 459)->save(public_path('product_images/'.$image_name1));
            $product->image_one=$image_name1;
      }
      if($image_two){
            // image_two
            $image_name2=hexdec(uniqid()).'.'.$image_two->extension();
            Image::make($image_two)->resize(521, 459)->save(public_path('product_images/'.$image_name2));
            $product->image_two=$image_name2;
      }
      if($image_three){
            // image_three
            $image_name3=hexdec(uniqid()).'.'.$image_three->extension();
            Image::make($image_three)->resize(521, 459)->save(public_path('product_images/'.$image_name3));
            $product->image_three=$image_name3;
      }
       $product->update();
       return response()->json(['success'=>'success']);
        
    }
    public function edit($id){
       $product=Product::findOrFail($id);
       $category=Category::all();
       $brand=Brand::all();
       return response()->json([$product,$category,$brand]);
        die();
        return view('admin/product/edit',[
            'product'=>Product::find($id),
            'categories'=>Category::all(),
            'brands'=>Brand::all(),
        ]);       
    }
    public function update( request $request)
    {
        $product =Product::find($request->id);
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
        $product->mid_slider=$request->mid_slider;
        $product->hot_new=$request->hot_new;
        $product->trend=$request->trend; 
        $product->byeonegetone=$request->byeonegetone; 
        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;
        if($image_one){
              // image_one
              $image_name1=hexdec(uniqid()).'.'.$image_one->extension();
              Image::make($image_one)->resize(521, 459)->save(public_path('product_images/'.$image_name1));
              $product->image_one=$image_name1;
        }
        if($image_two){
              // image_two
              $image_name2=hexdec(uniqid()).'.'.$image_two->extension();
              Image::make($image_two)->resize(521, 459)->save(public_path('product_images/'.$image_name2));
              $product->image_two=$image_name2;
        }
        if($image_three){
              // image_three
              $image_name3=hexdec(uniqid()).'.'.$image_three->extension();
              Image::make($image_three)->resize(521, 459)->save(public_path('product_images/'.$image_name3));
              $product->image_three=$image_name3;
        }

    

        
    if($product->save()){
        return back()->with('info','product updated successfully');
    }

    }
    public function destroy($id){
    $product_id=Product::findOrFail($id);

   $image_one=$product_id->image_one;
   $image_two=$product_id->image_two;
   $image_three=$product_id->image_three;

   if($image_one){
    unlink('product_images/'.$product_id->image_one);
   }
   if($image_two){
    unlink('product_images/'.$product_id->image_two);
   }
   if($image_three){
    unlink('product_images/'.$product_id->image_three);
   }

    $product_id->delete();
    return response()->json(['success'=>'ssdfs']);
    

    }
    public function show($id){


        $product = DB::table('products')
                    ->join('categories','products.category_id','categories.id')
                    ->join('brands','products.brand_id','brands.id')
                    ->select('products.*','categories.category_name','brands.brand_name')
                    ->where('products.id',$id)->first();
                    // return response()->json($product);
                    return view('Admin/product/show',compact('product'));

    }
    public function getsubcat($id){
        // $cat = Sub_category::find($id)->where('category_id',$id)->get();
       $cat = DB::table('sub_categories')->where('category_id',$id)->get();
       
    return json_encode($cat);
    // return response()->json($cat);

    }
 
  public function destroytest($id){
    $product_id=Product::find($id);
    unlink('product_images/'.$product_id->image_one);
    unlink('product_images/'.$product_id->image_two);
    unlink('product_images/'.$product_id->image_three);

$product_id->delete();
return response()->json(['success'=>'dsdfsdfsd']);
  }


public function statusupdate($id){
    $product=Product::where('id',$id)->first();
    if($product->status ==0){
        $product->update([
                'status'=>1
        ]);

    }
    else{
       $product->update([
                'status'=>0
        ]);


    }
    return response()->json(['success'=>'success']);
}
}

