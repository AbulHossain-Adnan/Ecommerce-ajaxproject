<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order_detail;
class Order_detailsController extends Controller
{
public function index()
{
return view('admin/order_details/index',[
'order_details'=>Order_detail::all()
]);
}

}