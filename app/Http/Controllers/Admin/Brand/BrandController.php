<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Brand;
use App\Models\Product;


class BrandController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/brand/index',[
            'brands'=>Brand::all(),
            'products'=>Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
   $request->validate([
            'brand_name'=>'required',
            'brand_photo'=>'required',

        ]);

       
     

        $data= new Brand();
        $data->brand_name=$request->brand_name;
                                 
      
          if ($request->hasFile('brand_photo')) {
            $image=$request->file('brand_photo');
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('images'),$imagename);
            $data->brand_photo=$imagename;
}
       
        
        $data->save();
        return back()->with('message','brand added succefully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Brand::findOrFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function updated(Request $request){
    $data=Brand::findOrFail($request->id);
      if ($request->hasFile('brand_photo')) {
            $image=$request->file('brand_photo');
            $imagename=time().'.'.$image->extension();
            $image->move(public_path('images'),$imagename);
            $data->brand_photo=$imagename;

}
$data->brand_name=$request->brand_name;
$data->save();
return back()->with('message','brand updated successfully');
  
}



    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Brand::findOrFail($id);
    unlink('images/'.$data->brand_photo);

    $data->delete();
    return back()->with('message','brand deleted succesfully');

    }
}
