<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class UserReturnController extends Controller
{
public function orderreturn($order_id){

Order::find($order_id)->where('status',3)->update(['return'=>1]);
return back()->with('message','Order return Request successfully done');
}
public function orderreturnrequest(){
return view('admin/order/request',[
'requests'=>Order::where('status',3)->where('return',1)->get()
]);
}

public function allreturnrequest(){
return view('admin/order/request',[
'requests'=>Order::where('return',2)->get(),

]);
}

public function orderreturnapprove($order_id){

Order::find($order_id)->update(['return'=>2]);
return back()->with('message','return request approve successfully');

}
public function returncancel($id){
Order::find($id)->update(['return'=>3]);
return response()->json(['success'=>'sdfs']);
}
}