<?php
namespace App\Http\Controllers;
use Request;
use App\Models\Admin\Seo;
use App\Models\Admin\Site;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Product;
class ShopController extends Controller
{



public function shoppage(){
if(Request::get('sort') == 'price_asc'){
		$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
	$products=Product::OrderBy('discount_price','asc')->where('status',1)->with('category','brand')->get();
return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
}
elseif(Request()->get('sort') == 'price_dsc'){
	$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
		$products=Product::where('status',1)
	->OrderBy('discount_price','desc')->get();
	
return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	}
	elseif(Request::get('sort')=='newes'){
		$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
		$products=Product::where('status',1)
	->OrderBy('created_at','desc')->get();
return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	}
	elseif(Request::get('sort')=='popolarity'){
		$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
		$products=Product::where('status',1)
	->OrderBy('discount_price','desc')->get();
return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	
	}
	elseif(Request::get('sort')=='yellow'){
			$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
		$products=Product::where('status',1)
	->where('product_color','yellow')->get();
	
	return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	
	} elseif(Request::get('sort')=='black'){
		$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
		$products=Product::where('status',1)
	->where('product_color','black')->get();
	return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	
	} elseif(Request::get('sort')=='blue'){
			$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
		$products=Product::where('status',1)
	->where('product_color','blue')->get();
	return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	
	} elseif(Request::get('sort')=='red'){
			$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
		$products=Product::where('status',1)
	->where('product_color','red')->get();
	return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	
	} elseif(Request::get('sort')=='white'){
			$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
		$products=Product::where('status',1)
	->where('product_color','white')->get();
	return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	}
			$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
$products=Product::where('status',1)->with('category','brand')->get();
	return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
	
}
public function categoryshopproducts($id){
		$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$category_name=Category::first();
$site_setting=Site::first();
$products=Product::where('status',1)->with('category','brand')->where('category_id',$id)->get();
	return view('pages/shop',compact('categories','seos','site_setting','products','brands','category_name'));
}
public function brandshopproducts($id){
	$brands=Brand::all();
		$seos=Seo::first();
$categories=Category::all();
$site_setting=Site::first();
$products=Product::where('status',1)->with('category','brand')->where('brand_id',$id)->get();
	return view('pages/shop',compact('categories','seos','site_setting','products','brands'));
}
}