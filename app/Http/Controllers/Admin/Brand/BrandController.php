<?php
namespace App\Http\Controllers\Admin\Brand;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use App\Models\Product;
class BrandController extends Controller
{


public function index()
{
$data=Brand::OrderBy('id','DESC')->get();
return response()->json($data);

}
public function create()
{
return view('admin/brand/index',[
'brands'=>Brand::all(),
'products'=>Product::all(),
]);
}
public function store(Request $request)
{
$data= new Brand();
$data->brand_name=$request->input('brand_name');
if($request->hasfile('brand_photo')){
$file=$request->file('brand_photo');
$file_name=time().'.'.$file->extension();
$file->move(public_path('brand_images/'),$file_name);
$data->brand_photo=$file_name;
}
$data->save();
return response()->json(['success'=>'sdfs']);
}
public function show($id)
{
//
}
public function edit($id)
{
$data=Brand::findOrFail($id);
return response()->json($data);
}
public function updated(Request $request){
$data_id=$request->input('id');
$data=Brand::findOrFail($data_id);
if ($request->hasFile('brand_photo')) {
$image=$request->file('brand_photo');
$imagename=time().'.'.$image->extension();
$image->move(public_path('brand_images/'),$imagename);
$data->brand_photo=$imagename;
}
$data->brand_name=$request->input('brand_name');
$data->update();
return response()->json(['success'=>'sfds']);

}
public function update(Request $request, $id)
{
//
}
public function destroy($id)
{
$data=Brand::findOrFail($id);
unlink('brand_images/'.$data->brand_photo);
$data->delete();
return response()->json(['success'=>'dsdfs']);
}
}