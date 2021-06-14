<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'frontend.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('user.logout');

// admin route 
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/admin', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [App\Http\Controllers\Admin\LoginController::class, 'login']);
Route::get('/admin/logout', [App\Http\Controllers\Admin\HomeController::class, 'logout'])->name('admin.logout');
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::post('category/updated',[CategoryController::class,'udpated']);
    Route::resource('category', CategoryController::class);
});

// Route for product without resource controller practice
Route::get('/admin/product/add', [App\Http\Controllers\Admin\Product\ProductController::class, 'create'])->name('add.product');
Route::get('/admin/product/all', [App\Http\Controllers\Admin\Product\ProductController::class, 'index'])->name('all.product');
Route::POST('/admin/product/store', [App\Http\Controllers\Admin\Product\ProductController::class, 'store'])->name('product.store');
Route::get('admin/product/edit/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'edit'])->name('product.edit');
Route::get('admin/product/show/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'show'])->name('product.show');
Route::POST('admin/product/update', [App\Http\Controllers\Admin\Product\ProductController::class, 'update'])->name('product.update');
Route::POST('admin/product/delete', [App\Http\Controllers\Admin\Product\ProductController::class, 'destroy'])->name('product.delete');
// Product route end



// Route for Status controller
Route::get('status/active/{id}',[App\Http\Controllers\Admin\Status\StatusController::class,'active'])->name('status.active');
Route::get('status/deactive/{id}',[App\Http\Controllers\Admin\Status\StatusController::class,'deactive'])->name('status.deactive');



// Roote for subcategory selecte
Route::get('/get_subcategory/{id}',[App\Http\Controllers\Admin\Product\ProductController::class,'getsubcat']);

 //  Route for subcategory 
 Route::get('/sub_category/index',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'index']);
 Route::get('/sub_category/alldata',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'alldata']);
  Route::post('/subcategory/store/',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'store']);
  Route::get('/subcategory/edit/{id}',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'edit']);
  Route::get('/subcategory/update/{id}',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'update']);
   Route::get('/subcategory/delete/{id}',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'delete']);


   // Route for Brand 
   Route::post('/brand/updated',[App\Http\Controllers\Admin\Brand\BrandController::class,'updated']);
   Route::resource('brand', BrandController::class);
 