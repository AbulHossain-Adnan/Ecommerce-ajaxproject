<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function index()
    {
       $data=Category::OrderBy('id', 'DESC')->get();
       return response()->json($data);
    }


    public function create()
    {
         $categories = Category::all();
     
        return view('admin.category.index', compact('categories'));
    }

    public function store(Request $request)
    {
       

        $data= new Category();
        $data->category_name=$request->input('category_name');
      $data->save();
        return response()->json(['success'=>'data added succesfully']);
    }

    public function edit($id) 
    {
        
        $category = Category::findOrFail($id);
        // return $category;
        return response()->json($category);
    } 

    public function update(Request $request, $id) 
    {
        $data=Category::findOrFail($id);
        $data->category_name=$request->category_name;
        $data->update();
        return response()->json(['success'=>'success']);
      
       
        
    } 
    public function destroy($id){
       
      Category::find($id)->delete();
return response()->json(['success'=>'success']);
    }
    public function confirmdelete($id){
Category::find($id)->delete();
return response()->json(['success'=>'success']);
    }
  
}
