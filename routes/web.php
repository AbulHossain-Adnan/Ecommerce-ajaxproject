<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Division\DivisionController;
use App\Http\Controllers\Admin\District\DistrictController;
use App\Http\Controllers\Admin\Site\Site_settingController;
use App\Http\Controllers\Admin\Seo\SeoController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Order_detailsController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\Admin\Area\AreaController;
use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Models\Admin\Category;
use App\Models\Admin\Brand;
use App\Models\Product;
use App\Models\Seo;
use App\Models\Admin\Site;




// Route for forntend*********************************
Route::view('/', 'frontend.index',[
  'seos'=>Seo::first(),
    'categories'=>Category::all(),
    'products'=>Product::all(),
    'brands'=>Brand::all(),
    'main_sliders'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'main_slider',1)->first(),
    'feachereds'=>Product::orderBy('id','desc')->with('brand')->where('status',1)->get(),
    'tends'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'trend',1)->get(),
    'best_rateds'=>Product::orderBy('id','desc')->with('brand')->where('status',1 && 'best_rated',1)->get(),
    'middle_sliders'=>Product::orderBy('id','desc')->with('Category','brand')->where('status',1 && 'mid_slider',1)->limit(3)->get(),
    'byeonegetones'=>Product::orderBy('id','desc')->with('Category','brand')->where('status',1)->where('byeonegetone',1)->limit(6)->get(),

    'site_setting'=>Site::first(),
])->name('front.home');




Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user_custom/', [App\Http\Controllers\HomeController::class, 'userlogin'])->name('user_custom');
Route::get('/user/registration/', [App\Http\Controllers\HomeController::class, 'userregister'])->name('user.register');
Route::POST('/user/registration/post/', [App\Http\Controllers\HomeController::class, 'registerpost'])->name('register.post');



Route::get('/user/order/details/{order_id}', [App\Http\Controllers\HomeController::class, 'orderdetail']);

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
// Route::get('/productview/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'productview']);
Route::get('/productview/{id}', [App\Http\Controllers\Admin\Product\Productviewcontroller::class, 'productview']);


Route::POST('search/product', [App\Http\Controllers\Searchcontroller::class, 'search']);

Route::POST('/find/product/', [App\Http\Controllers\Searchcontroller::class, 'findproduct']);












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
   // Route::get('user/login',[App\Http\Controllers\customloginController::class,'login'])->name('user.login');






   // Route for wishlist
   Route::get('/wishlist/added/{id}',[App\Http\Controllers\Wishlist\WishlistController::class,'addwishlist'])->name('wish.added');
   Route::get('/wishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'wishlist'])->name('wish.list');
   Route::get('/wishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'wishlist'])->name('wish.list');
   Route::get('/addwishlistt/{id}',[App\Http\Controllers\Wishlist\WishlistController::class,'wishlistt']);
   Route::get('/miniwishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'miniwishlist']);
   Route::get('/user/wishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'userwishlist']);







   




   // Route for cart
    Route::get('/add/cart/{id}',[App\Http\Controllers\Cart\CartController::class,'addcart'])->name('cart.added');
    Route::get('/check',[App\Http\Controllers\Cart\CartController::class,'check']);
    Route::get('/cart_show',[App\Http\Controllers\Cart\CartController::class,'cart_show'])->name('cart.show');
    Route::get('/cart/remove/{rowId}',[App\Http\Controllers\Cart\CartController::class,'cartremove'])->name('cart.delete');
    Route::get('/coupon_cart/remove/{rowId}',[App\Http\Controllers\Admin\Coupon\CouponController::class,'cartremove'])->name('coupon_cart.delete');

    Route::post('/cart/update/',[App\Http\Controllers\Cart\CartController::class,'cartupdate'])->name('cart.update');
    Route::post('/addtocart/',[App\Http\Controllers\Cart\CartController::class,'addtocart'])->name('addto.cart');
      Route::POST('/applycouponn/',[App\Http\Controllers\Cart\CartController::class,'appcoupon']);








// cart ajax test
       Route::get('/cartdata/',[App\Http\Controllers\Cart\CartController::class,'alldata']);
       Route::get('/increment/{rowId}',[App\Http\Controllers\Cart\CartController::class,'increment']);
       Route::get('/decrement/{rowId}',[App\Http\Controllers\Cart\CartController::class,'decrement']);

       Route::get('/cartremove/{rowId}',[App\Http\Controllers\Cart\CartController::class,'destroy']);
        // Route::get('/cartcalculation/',[App\Http\Controllers\Cart\CartController::class,'cartcalculation']);
        // Route::get('/cartcalculation/',[App\Http\Controllers\Cart\CartController::class,'cartcalculation']);
        Route::get('/cartcal/',[App\Http\Controllers\Cart\CartController::class,'cartcal']);

        Route::get('/couponremove/',[App\Http\Controllers\Cart\CartController::class,'couponremove']);
        Route::get('/minicart/',[App\Http\Controllers\Cart\CartController::class,'minicart']);

        

        





    // route for coupon\

    Route::get('/add/coupon/',[App\Http\Controllers\Admin\Coupon\CouponController::class,'create'])->name('coupon.create');
     Route::post('/coupon/store/',[App\Http\Controllers\Admin\Coupon\CouponController::class,'store'])->name('coupon.store');
     Route::DELETE('/coupon/destroy/{id}',[App\Http\Controllers\Admin\Coupon\CouponController::class,'destroy'])->name('coupon.destroy');
     Route::get('/coupon/edit/{id}',[App\Http\Controllers\Admin\Coupon\CouponController::class,'edit']);
     Route::post('/coupon/updated',[App\Http\Controllers\Admin\Coupon\CouponController::class,'updated']);






     // route for checkout Controller 

     Route::post('/checkout/',[App\Http\Controllers\Checkout\CheckoutController::class,'checkout'])->name('checkout');
     Route::post('/final_step/',[App\Http\Controllers\Checkout\CheckoutController::class,'payment'])->name('final_step');

     
    





     // Route for stripe payment 


     Route::get('stripe',[App\Http\Controllers\StripePaymentController::class,'stripe']);
     Route::post('stripe',[App\Http\Controllers\StripePaymentController::class,'stripePost'])->name('stripe.post');








     // Route for Division
     Route::post('division/updated',[App\Http\Controllers\Admin\Division\DivisionController::class,'updated']);
     Route::resource('division', DivisionController::class);






     // Route for districtController
     Route::post('district/updated',[App\Http\Controllers\Admin\District\DistrictController::class,'updated']);
     Route::get('/get_district/{division_id}',[App\Http\Controllers\Admin\District\DistrictController::class,'getdistrict']);
     Route::resource('district', DistrictController::class);





     // route for area

      Route::post('area/updated',[App\Http\Controllers\Admin\Area\AreaController::class,'updated']);
      Route::get('/get_area/{district_id}',[App\Http\Controllers\Admin\Area\AreaController::class,'getarea']);
     Route::resource('area', AreaController::class);







// Route for OrderController

     Route::get('/admin/accept/payment/',[App\Http\Controllers\OrderController::class,'acceptpayment'])->name('accept.payment');
     Route::get('/admin/cancel/order/',[App\Http\Controllers\OrderController::class,'cancel'])->name('order.cancel');
     Route::get('/admin/order/progress/',[App\Http\Controllers\OrderController::class,'progress'])->name('order.progress');
     Route::get('/admin/delivary/success/',[App\Http\Controllers\OrderController::class,'delivarysuccess'])->name('delivary.success');
     Route::get('/admin/payment/accept/{order_id}',[App\Http\Controllers\OrderController::class,'paymentaccept']);
      Route::get('/admin/order/cancel/{order_id}',[App\Http\Controllers\OrderController::class,'ordercancel']);
      Route::get('/admin/order/progress/{order_id}',[App\Http\Controllers\OrderController::class,'orderprogress']);
      Route::get('/admin/delevary/success/{order_id}',[App\Http\Controllers\OrderController::class,'orderdelivarysuccess']);

 Route::get('/user/order/return/{order_id}',[App\Http\Controllers\User\UserReturnController::class,'orderreturn']);
 Route::get('order/return/request/',[App\Http\Controllers\User\UserReturnController::class,'orderreturnrequest']);
 
 Route::get('all/return/request',[App\Http\Controllers\User\UserReturnController::class,'allreturnrequest']);
 Route::get('order/return/canel/',[App\Http\Controllers\User\UserReturnController::class,'allreturnrequest']);


 Route::get('order/approve/cancel/{order_id}',[App\Http\Controllers\User\UserReturnController::class,'returncancel']);
 Route::get('order/return/approve/{order_id}',[App\Http\Controllers\User\UserReturnController::class,'orderreturnapprove']);


       Route::POST('/order/tracking/',[App\Http\Controllers\OrderController::class,'ordertracking']);




     Route::resource('order', OrderController::class);
     Route::resource('order_details', Order_detailsController::class);
     Route::resource('shipping', ShippingController::class);



     // Route for db2_set_option(resource, options, type)

      Route::resource('seo', SeoController::class);





      // Route for Report
      Route::get('/today/order/report/',[App\Http\Controllers\Admin\Report\ReportController::class,'todayreport'])->name('today.orders');
      Route::get('/today/delivary/orders/',[App\Http\Controllers\Admin\Report\ReportController::class,'todaydelivary'])->name('today.delivarys');
      Route::get('/this/month/delivarys/',[App\Http\Controllers\Admin\Report\ReportController::class,'thismonth'])->name('this.month');
       Route::get('/this/year/delivarys/',[App\Http\Controllers\Admin\Report\ReportController::class,'thisyear'])->name('this.year');
        Route::get('/report/search/',[App\Http\Controllers\Admin\Report\ReportController::class,'reportsearch'])->name('report.search');


          Route::POST('/admin/report/month/search/',[App\Http\Controllers\Admin\Report\ReportController::class,'monthsearch'])->name('month.search');
            Route::POST('/admin/report/year/search/',[App\Http\Controllers\Admin\Report\ReportController::class,'yearsearch'])->name('year.search');
             Route::POST('/admin/report/date/search/',[App\Http\Controllers\Admin\Report\ReportController::class,'datesearch'])->name('date.search');







// Route for userolecontroller


 Route::get('/admin/create/user_roll/',[App\Http\Controllers\Admin\User_Role\UserroleController::class,'createrole'])->name('create.role');
  Route::POST('/admin/user_roll/store/',[App\Http\Controllers\Admin\User_Role\UserroleController::class,'userrolestore'])->name('user_role.store');
   Route::get('/admin/all/user_roll/',[App\Http\Controllers\Admin\User_Role\UserroleController::class,'alluserroll'])->name('alluser.role');

   // action
   Route::get('/user/role/edit/{id}',[App\Http\Controllers\Admin\User_Role\UserroleController::class,'useredit']);
   Route::DELETE('/user/role/delete/{id}',[App\Http\Controllers\Admin\User_Role\UserroleController::class,'userdelete']);
    Route::POST('/admin/user/update/{id}',[App\Http\Controllers\Admin\User_Role\UserroleController::class,'userupdate']);






// Route for site setting
     Route::resource('site', Site_settingController::class);






// route for socialite
     Route::get('login/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);

 





 // route for socialite facebook
Route::get('login/facebook', [App\Http\Controllers\Facebookcontroller::class, 'redirectToFacebook']);
Route::get('login/facebook/callback', [App\Http\Controllers\Facebookcontroller::class, 'handleFacebookCallback']);

 