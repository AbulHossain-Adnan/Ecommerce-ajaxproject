<?php

namespace App\Http\Controllers\Admin\District;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\District;
use App\Models\Admin\Division;


class DistrictController extends Controller
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
        return view('admin/district/index',[
            'districts'=>District::all(),
            'divisions'=>Division::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=District::OrderBy('id','DESC')->get();
        return Response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        District::create($request->input());
    
        return Response()->json(['success'=>'sdfs']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data=District::find($id);
        return Response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(request $request){
        $data_id=$request->id;
        $data=District::find($data_id);
        $data->update(['district'=>$request->district_name,'division_id'=>$request->division_id]);
        return back()->with('message','data update successfully');
    }


    public function update(Request $request, $id)
    {
        $data=District::find($id);
        $data->district=$request->district;
        $data->division_id=$request->division_id;
        $data->update();
        return Response()->json(['success'=>'sdfsd']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        District::find($id)->delete();
        return Response()->json(['success'=>'sdfsd']);
    }
   
}
