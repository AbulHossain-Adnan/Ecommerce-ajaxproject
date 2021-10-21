<?php
namespace App\Http\Controllers\Admin\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Admin\Seo;
use App\Models\Admin\Site;
use App\Models\Sub_category;
use DB;
class StockController extends Controller
{
public function __construct(){
    $this->middleware('auth:admin');
}
public function stock(){
$brands=Brand::all();
$products = DB::table('products')
->join('categories','products.category_id','categories.id')
->join('brands','products.brand_id','brands.id')
->select('products.*','categories.category_name','brands.brand_name')->get();

// return response()->json($products);
return view('admin/stock/index',compact('products','brands'));

}
}