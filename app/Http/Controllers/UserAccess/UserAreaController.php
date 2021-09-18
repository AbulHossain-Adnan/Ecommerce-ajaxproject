<?php

namespace App\Http\Controllers\UserAccess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\District;
use App\Models\Admin\Area;

class UserAreaController extends Controller
{
     public function getarea($district_id){
$data=Area::where('district_id',$district_id)->get();
return Response()->json($data);
    }
}
