<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;

class CustomCategoryController extends Controller
{
    
public function categoryshow($id){
    return view('pages/womenfassion',[
        'categories'=>Category::all(),
        'brands'=>Brand::all(),
    ]);
}

}
