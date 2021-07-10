<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Product;




// Route for forntend*********************************
Route::view('/', 'frontend.index',[
    'categories'=>Category::all(),
    'products'=>Product::all(),
    'brands'=>Brand::all(),
    'main_sliders'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'main_slider',1)->first(),
    'feachereds'=>Product::orderBy('id','desc')->with('brand')->where('status',1)->get(),
    'tends'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'trend',1)->get(),
    'best_rateds'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'best_rated',1)->get(),
    'middle_sliders'=>Product::orderBy('id','desc')->with('Category','brand')->where('status',1 && 'mid_slider',1)->limit(3)->get(),
    'byeonegetones'=>Product::orderBy('id','desc')->with('Category','brand')->where('status',1)->where('byeonegetone',1)->limit(6)->get(),
])->name('front.home');




Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('user.logout');
Route::get('change/password', [App\Http\Controllers\HomeController::class, 'change_password'])->name('change.password');




// admin route 
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
Route::get('/admin', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [App\Http\Controllers\Admin\LoginController::class, 'login']);
Route::get('/admin/logout', [App\Http\Controllers\Admin\HomeController::class, 'logout'])->name('admin.logout');




// Route for  Category
Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['auth:admin']], function () {
    Route::post('category/updated',[CategoryController::class,'udpated']);
  
    Route::resource('category', CategoryController::class);
});


// route for custom category
  Route::get('category/page/{id}',[App\Http\Controllers\CustomCategoryController::class,'categoryshow'])->name('category.show');




// Route for product controller
Route::get('/admin/product/add', [App\Http\Controllers\Admin\Product\ProductController::class, 'create'])->name('add.product');
Route::get('/admin/product/all', [App\Http\Controllers\Admin\Product\ProductController::class, 'index'])->name('all.product');
Route::POST('/admin/product/store', [App\Http\Controllers\Admin\Product\ProductController::class, 'store'])->name('product.store');
Route::get('admin/product/edit/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'edit'])->name('product.edit');
Route::get('admin/product/show/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'show'])->name('product.show');
Route::POST('admin/product/update', [App\Http\Controllers\Admin\Product\ProductController::class, 'update'])->name('product.update');
Route::POST('admin/product/delete', [App\Http\Controllers\Admin\Product\ProductController::class, 'destroy'])->name('product.delete');
Route::get('/singleproduct/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'singleproduct'])->name('singleproduct.show');
Route::get('/productview/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'productview']);





// Route for Status controller
Route::get('status/active/{id}',[App\Http\Controllers\Admin\Status\StatusController::class,'active'])->name('status.active');
Route::get('status/deactive/{id}',[App\Http\Controllers\Admin\Status\StatusController::class,'deactive'])->name('status.deactive');




 //  Route for subcategory 
Route::get('/sub_category/index',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'index']);
Route::get('/sub_category/alldata',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'alldata']);
Route::post('/subcategory/store/',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'store']);
Route::get('/subcategory/edit/{id}',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'edit']);
Route::get('/subcategory/update/{id}',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'update']);
Route::get('/subcategory/delete/{id}',[App\Http\Controllers\Admin\Category\SubcategoryController::class,'delete']);
Route::get('/get_subcategory/{id}',[App\Http\Controllers\Admin\Product\ProductController::class,'getsubcat']);





// Route for Brand 
Route::post('/brand/updated',[App\Http\Controllers\Admin\Brand\BrandController::class,'updated']);
Route::resource('brand', BrandController::class);
 



 // Route for user login registration
   Route::get('user/login',[App\Http\Controllers\customloginController::class,'login'])->name('user.login');




   // Route for wishlist
   Route::get('/wishlist/added/{id}',[App\Http\Controllers\Wishlist\WishlistController::class,'addwishlist'])->name('wish.added');
   Route::get('/wishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'wishlist'])->name('wish.list');



   // Route for cart
    Route::get('/add/cart/{id}',[App\Http\Controllers\Cart\CartController::class,'addcart'])->name('cart.added');
    Route::get('/check',[App\Http\Controllers\Cart\CartController::class,'check']);
    Route::get('/cart_show',[App\Http\Controllers\Cart\CartController::class,'cart_show'])->name('cart.show');
    Route::get('/cart/remove/{rowId}',[App\Http\Controllers\Cart\CartController::class,'cartremove'])->name('cart.delete');
    Route::get('/coupon_cart/remove/{rowId}',[App\Http\Controllers\Admin\Coupon\CouponController::class,'cartremove'])->name('coupon_cart.delete');

    Route::post('/cart/update/',[App\Http\Controllers\Cart\CartController::class,'cartupdate'])->name('cart.update');
    Route::post('/cart/add/',[App\Http\Controllers\Cart\CartController::class,'addtocart'])->name('addto.cart');
      Route::post('/coupon/apply',[App\Http\Controllers\Cart\CartController::class,'coupon'])->name('coupon.apply');



// cart ajax test
       Route::get('/cartdata/',[App\Http\Controllers\Cart\CartController::class,'alldata']);
       Route::post('/increment/',[App\Http\Controllers\Cart\CartController::class,'increment']);




    // route for coupon\

    Route::get('/add/coupon/',[App\Http\Controllers\Admin\Coupon\CouponController::class,'create'])->name('coupon.create');
     Route::post('/coupon/store/',[App\Http\Controllers\Admin\Coupon\CouponController::class,'store'])->name('coupon.store');
     Route::DELETE('/coupon/destroy/{id}',[App\Http\Controllers\Admin\Coupon\CouponController::class,'destroy'])->name('coupon.destroy');
     Route::get('/coupon/edit/{id}',[App\Http\Controllers\Admin\Coupon\CouponController::class,'edit']);
     Route::post('/coupon/updated',[App\Http\Controllers\Admin\Coupon\CouponController::class,'updated']);




     // route for checkout Controller 

     Route::get('/checkout/',[App\Http\Controllers\Checkout\CheckoutController::class,'checkout'])->name('checkout');
    


