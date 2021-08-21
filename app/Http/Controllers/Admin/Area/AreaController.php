<?php

namespace App\Http\Controllers\Admin\Area;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\District;
use App\Models\Admin\Area;

class AreaController extends Controller
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
        return view('admin/area/index',[
            'districts'=>District::all(),
            'areas'=>Area::all()
        ]);    }

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
        $request->validate(['area_name'=>'required',
            'district_id'=>'required'
            ]);
        Area::insert(['area'=>$request->area_name,'district_id'=>$request->district_id]);
        return back()->with('message','data added successfully');
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
        $data_id=Area::find($id);
        return Response()->json($data_id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(request $request){

$request->validate(['area_name'=>'required','district_id'=>'required']);


        $id=$request->id;
       Area::find($id)->update(['district_id'=>$request->district_id,'area'=>$request->area_name]);
       return back()->with('message','area update successfully');
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
        Area::find($id)->delete();
        return back()->with('message','area delete successfully');
    }
    public function getarea($district_id){
$data=Area::where('district_id',$district_id)->get();
return Response()->json($data);
    }
}
