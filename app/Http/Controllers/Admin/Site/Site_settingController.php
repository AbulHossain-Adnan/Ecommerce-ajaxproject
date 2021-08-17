<?php

namespace App\Http\Controllers\Admin\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Site;

class Site_settingController extends Controller
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
        return view('admin/site/index',['sites'=>Site::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/site/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=array();
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['company_name']=$request->company_name;
        $data['facebook']=$request->facebook;
        $data['google']=$request->google;
        $data['tweeter']=$request->tweeter;
        $data['youtube']=$request->youtube;
        $data=Site::insert($data);
        return back()->with('message','site added succefully');

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
        return view('admin/site/edit',['sites'=>Site::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $data=array();
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['address']=$request->address;
        $data['company_name']=$request->company_name;
        $data['facebook']=$request->facebook;
        $data['google']=$request->google;
        $data['tweeter']=$request->tweeter;
        $data['youtube']=$request->youtube;
        $data=Site::find($id)->update($data);
        return redirect()->route('site.index')->with('message','data updated succefully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Site::find($id)->delete();
        return back()->with('message','site delted succefully');
    }
}
