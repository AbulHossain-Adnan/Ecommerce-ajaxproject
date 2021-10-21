<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{

use AuthenticatesUsers;
protected $redirectTo = 'admin/home';

public function __construct()
{
$this->middleware('guest:admin')->except('logout');
}
public function showLoginForm()
{
if (Auth::id()) {
return redirect()->back();
} else {
return view('admin.auth.login');
}
}
protected function guard()
{
return Auth::guard('admin');
}
}