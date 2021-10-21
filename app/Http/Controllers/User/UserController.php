<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\District;
use App\Models\Admin\Area;
use App\Models\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Seo;
use App\Models\Admin\Site;


class UserController extends Controller
{
      public function getdistrict($division_id){

       $data= District::where('division_id',$division_id)->get();

       return Response()->json($data);

    }
     public function getarea($district_id){
		$data=Area::where('district_id',$district_id)->get();
		return Response()->json($data);
    }

      public function singleproduct($id){
        $single_products=Product::with('category','brand')->where('id',$id)->first();
        $color=$single_products->product_color;
        $product_color=explode(',', $color);
        $size=$single_products->product_size;
        $product_size=explode(',', $size);
        $seos=Seo::first();
        $categories=Category::all();
        $site_setting=Site::first();

        return view('pages/single_product',compact('single_products','product_color','product_size','seos','categories','site_setting'));
    }

    public function categoryshow($id){
    return view('pages/category_product',[
        'categories'=>Category::all(),
        'brands'=>Brand::all(),
        'seos'=>Seo::first(),
        'site_setting'=>Site::first(),
        'products'=>Product::where('status',1)->where('category_id',$id)->get(),
       
    ]);
}

  public function productview($id){
    $product=Product::find($id)->with('brand','category')->where('status',1)->where('id',$id)->first();
    $color=$product->product_color;
    $quantity=$product->product_quantity;
    $size=$product->product_size;
    $product_color=explode(',',$color);
    $product_size=explode(',',$size);
    return response()->json(array(
        'product' => $product,
        'color' => $product_color,
        'size' => $product_size,

    ));

  }


  public function search(request $request){

				
return view('pages/search_product',[
		'categories'=>Category::all(),
        'brands'=>Brand::all(),
        'seos'=>Seo::first(),
        'site_setting'=>Site::first(),
        'products'=>Product::where("product_name","LIKE","%".$request->search."%")
					->orwhere("product_code","LIKE","%".$request->search."%")
					->orwhere("product_details","LIKE","%".$request->search."%")
					->orwhere("product_color","LIKE","%".$request->search."%")->paginate(5),


		]);
  }

  public function findproduct(request $request){


  	$products=Product::where("product_name","LIKE","%".$request->search."%")
					->orwhere("product_code","LIKE","%".$request->search."%")
					->orwhere("product_details","LIKE","%".$request->search."%")
					->orwhere("product_color","LIKE","%".$request->search."%")->get();

					return view('pages/product_suggetion',compact('products'));


  }
}
