<?php

namespace App\Http\Controllers\UserAccess\District;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\District;

class UserDistrictController extends Controller
{
     public function getdistrict($division_id){

       $data= District::where('division_id',$division_id)->get();

       return Response()->json($data);

    }
}
