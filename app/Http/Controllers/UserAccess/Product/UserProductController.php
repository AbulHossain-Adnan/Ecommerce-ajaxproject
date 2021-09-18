<?php

namespace App\Http\Controllers\UserAccess\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin\Seo;
use App\Models\Admin\Site;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;


class UserProductController extends Controller
{
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
}
