<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Seo;
use App\Models\Admin\Site;


class CustomCategoryController extends Controller
{
   
public function categoryshow($id){
    return view('pages/womenfassion',[
        'categories'=>Category::all(),
        'brands'=>Brand::all(),
        'seos'=>Seo::first(),
        'site_setting'=>Site::first(),
       
    ]);
}

}
