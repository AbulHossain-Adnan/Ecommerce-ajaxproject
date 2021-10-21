<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Product;
use App\Models\Admin\Seo;
use App\Models\Admin\Site;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.index',[
  'seos'=>Seo::first(),
    'categories'=>Category::all(),
    'products'=>Product::all(),
    'brands'=>Brand::all(),
    'main_sliders'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'main_slider',1)->first(),
    'feachereds'=>Product::orderBy('id','desc')->with('brand')->where('status',1)->get(),
    'tends'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'trend',1)->get(),
    'best_rateds'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'best_rated',1)->get(),
    'middle_sliders'=>Product::orderBy('id','desc')->with('Category','brand')->where('status',1 && 'mid_slider',1)->limit(3)->get(),
    'byeonegetones'=>Product::orderBy('id','desc')->with('Category','brand')->where('status',1)->where('byeonegetone',1)->limit(6)->get(),
    'site_setting'=>Site::first(),
    'hot_deals'=>Product::where('status',1)->where('hot_deal',1)->with('category')->get(),
    'best_sellers'=>Product::where('status',1)->where('hot_deal',1)->where('best_rated',1)
    ->with('category')->get(),
]);
    }
}
