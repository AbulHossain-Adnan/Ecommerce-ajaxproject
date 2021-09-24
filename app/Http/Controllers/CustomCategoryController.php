<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Seo;
use App\Models\Admin\Site;
use App\Models\Product;



class CustomCategoryController extends Controller
{
   
public function categoryshow($id){
    return view('pages/category_product',[
        'categories'=>Category::all(),
        'brands'=>Brand::all(),
        'seos'=>Seo::first(),
        'site_setting'=>Site::first(),
        'products'=>Product::where('status',1)->where('category_id',$id)->get(),
       
    ]);
}

}
