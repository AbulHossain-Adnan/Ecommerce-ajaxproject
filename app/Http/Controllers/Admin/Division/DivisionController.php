<?php

namespace App\Http\Controllers\Admin\Division;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Division;

class DivisionController extends Controller
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
        return view('admin/division/index',[

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
        $data=Division::OrderBy('id','DESC')->get();
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
     
        Division::create($request->input());
        return Response()->json(['success'=>'data added']);
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

        $data=Division::findOrFail($id);
        return Response()->json($data);
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

        $id=$request->id;
        $data=Division::find($id);
       // $data->division = $request->division_name;
        $data->update([
            'division'=>$request->division_name
        ]);
        
    return back()->with('message','division update successfully');
    }
    public function update(Request $request, $id)
    {
        $data=Division::findOrFail($id);
        $data->division=$request->division;
        $data->save();
        return Response()->json(['success'=>'sdfs']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        
        $data=Division::findOrFail($id);
        $data->delete();
        return Response()->json(['success'=>'sdfs']);
    }
}
