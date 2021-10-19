<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;

class SettingController extends Controller
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
        $settings=Setting::all();
        return view('admin/setting/index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Setting::OrderBy('id','DESC')->get();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= new Setting();
        $data->vat=$request->input('vat');
        $data->shipping_charge=$request->input('shipping_charge');
        $data->shopname=$request->input('shopname');
        $data->email=$request->input('email');
        $data->phone=$request->input('phone');
        $data->address=$request->input('address');
       if ($request->hasFile('logo')) {
       $upload_file=$request->file('logo');
       $new_name=time().'.'.$upload_file->extension();
       $upload_file->move(public_path('images'),$new_name);
        $data->logo=$new_name;

}

        $data->save();
         return Response()->json(['success'=>'success']);

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
        $data=Setting::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request)
    {
        $data_id=$request->input('id');
        $data= Setting::findOrFail($data_id);
        $data->vat=$request->input('vat');
        $data->shipping_charge=$request->input('shipping_charge');
        $data->shopname=$request->input('shopname');
        $data->email=$request->input('email');
        $data->phone=$request->input('phone');
        $data->address=$request->input('address');
       if ($request->hasFile('logo')) {
       $upload_file=$request->file('logo');
       $new_name=time().'.'.$upload_file->extension();
       $upload_file->move(public_path('images'),$new_name);
        $data->logo=$new_name;
    }
     $data->update();
         return Response()->json(['success'=>'success']);
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Setting::find($id);
        unlink('images/'.$data->logo);
        $data->delete();
        return response()->json(['success'=>'success']);
    }
}
