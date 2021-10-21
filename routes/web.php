<?php
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Division\DivisionController;
use App\Http\Controllers\Admin\District\DistrictController;
use App\Http\Controllers\Admin\Site\Site_settingController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Coupon\CouponController;
use App\Http\Controllers\Admin\Seo\SeoController;
use App\Http\Controllers\Admin\Product\ProductController;
use App\Http\Controllers\Admin\User_Role\UserroleController;
use App\Http\Controllers\Order_detailsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\Admin\Area\AreaController;
use Illuminate\Support\Facades\Route;




//admin route 
Route::get('/admin/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])
->name('admin.home');
Route::get('/admin', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])
->name('admin.login');
Route::post('/admin', [App\Http\Controllers\Admin\LoginController::class, 'login']);
Route::get('/admin/logout', [App\Http\Controllers\Admin\HomeController::class, 'logout'])
->name('admin.logout');



  // Route for admin panel management

  //Category management
  Route::group(['middleware'=>'auth:admin'],function(){
  Route::group(['as' => 'admin.', 'prefix' => 'admin'], function () {
  Route::resource('category', CategoryController::class);
  });


  //product management
  Route::POST('/product/updated', [App\Http\Controllers\Admin\Product\ProductController::class, 'updated']);
  Route::get('/product/status/updated/{id}', [App\Http\Controllers\Admin\Product\ProductController::class, 'statusupdate']);
  Route::resource('product',ProductController::class);




  //subcategory management
  Route::resource('subCategory',SubCategoryController::class);


  //Brand magement 
  Route::post('/brand/updated',[App\Http\Controllers\Admin\Brand\BrandController::class,'updated']);
  Route::resource('brand', BrandController::class);


  //role management
  Route::POST('/user_roll/updated',[App\Http\Controllers\Admin\User_Role\UserroleController::class,'userroleupdated']);
  Route::resource('user_role',UserroleController::class);




  //coupon management\ 
  Route::resource('coupon',CouponController::class);
  //Division management
  Route::resource('division', DivisionController::class);
  //district management
  Route::resource('district', DistrictController::class);
  //area management
  Route::resource('area', AreaController::class);






  // Order management
  Route::get('/admin/accept/payment/',[App\Http\Controllers\OrderController::class,'acceptpayment'])
  ->name('accept.payment');
  Route::get('/admin/cancel/order/',[App\Http\Controllers\OrderController::class,'cancel'])
  ->name('order.cancel');
  Route::get('/admin/order/progress/',[App\Http\Controllers\OrderController::class,'progress'])
  ->name('order.progress');
  Route::get('/admin/delivary/success/',[App\Http\Controllers\OrderController::class,'delivarysuccess'])
  ->name('delivary.success');
  Route::get('/admin/payment/accept/{order_id}',[App\Http\Controllers\OrderController::class,'paymentaccept']);
  Route::get('/admin/order/cancel/{order_id}',[App\Http\Controllers\OrderController::class,'ordercancel']);
  Route::get('/admin/order/progress/{order_id}',[App\Http\Controllers\OrderController::class,'orderprogress']);
  Route::get('/admin/delevary/success/{order_id}',[App\Http\Controllers\OrderController::class,'orderdelivarysuccess']);
  Route::resource('order', OrderController::class);
    Route::resource('order_details', Order_detailsController::class);



  // return order management
  Route::get('/user/order/return/{order_id}',[App\Http\Controllers\User\UserReturnController::class,'orderreturn']);
  Route::get('order/return/request/',[App\Http\Controllers\User\UserReturnController::class,'orderreturnrequest']);
  Route::get('all/return/request',[App\Http\Controllers\User\UserReturnController::class,'allreturnrequest']);
  Route::get('order/return/canele/',[App\Http\Controllers\User\UserReturnController::class,'allreturnrequest']);
  Route::get('order/approve/cancel/{order_id}',[App\Http\Controllers\User\UserReturnController::class,'returncancel']);
  Route::get('order/return/approve/{order_id}',[App\Http\Controllers\User\UserReturnController::class,'orderreturnapprove']);
  Route::POST('/order/tracking/',[App\Http\Controllers\OrderController::class,'ordertracking']);
  Route::get('/order/return/cancel{id}',[App\Http\Controllers\User\UserReturnController::class,'returncancel']);


    // Seo management
    Route::resource('seo', SeoController::class);


    // Report management
    Route::get('/today/order/report/',[App\Http\Controllers\Admin\Report\ReportController::class,'todayreport'])
    ->name('today.orders');
    Route::get('/today/delivary/orders/',[App\Http\Controllers\Admin\Report\ReportController::class,'todaydelivary'])
    ->name('today.delivarys');
    Route::get('/this/month/delivarys/',[App\Http\Controllers\Admin\Report\ReportController::class,'thismonth'])
    ->name('this.month');
    Route::get('/this/year/delivarys/',[App\Http\Controllers\Admin\Report\ReportController::class,'thisyear'])
    ->name('this.year');
    Route::get('/report/search/',[App\Http\Controllers\Admin\Report\ReportController::class,'reportsearch'])
    ->name('report.search');
    Route::POST('/admin/report/month/search/',[App\Http\Controllers\Admin\Report\ReportController::class,'monthsearch'])
    ->name('month.search');
    Route::POST('/admin/report/year/search/',[App\Http\Controllers\Admin\Report\ReportController::class,'yearsearch'])
    ->name('year.search');
    Route::POST('/admin/report/date/search/',[App\Http\Controllers\Admin\Report\ReportController::class,'datesearch'])
    ->name('date.search');



  //setting management
   Route::get('/admin/setting/',[App\Http\Controllers\Admin\Setting\SettingController::class,'index']);
   Route::POST('/setting/updated',[App\Http\Controllers\Admin\Setting\SettingController::class,'updated']);
   Route::resource('setting',SettingController::class);
  //site management
   Route::POST('/site/updated/', [App\Http\Controllers\Admin\Site\Site_settingController::class, 'updated']);
  Route::resource('site', Site_settingController::class);




    //blog post management
    Route::get('/post/category/', [App\Http\Controllers\Admin\PostController::class, 'postcategory']);
    Route::POST('/post/category/store/',[App\Http\Controllers\Admin\PostController::class,'postcategorystore']);
    Route::get('/post/category/edit/{id}',[App\Http\Controllers\Admin\PostController::class,'postcategoryedit']);
    Route::POST('/post/category/updated/',[App\Http\Controllers\Admin\PostController::class,'postcategoryupdate']);
    Route::DELETE('/post/category/delete/{id}',[App\Http\Controllers\Admin\PostController::class,'postcategorydelete']);
    Route::get('/add/post/',[App\Http\Controllers\Admin\PostController::class,'addpost']);
    Route::POST('/post/store/',[App\Http\Controllers\Admin\PostController::class,'poststore']);
    Route::get('/post/edit/{id}',[App\Http\Controllers\Admin\PostController::class,'postedit']);
    Route::POST('/post/updated/',[App\Http\Controllers\Admin\PostController::class,'postupdated']);
    Route::DELETE('/post/delete/{id}',[App\Http\Controllers\Admin\PostController::class,'postdelete']);
    Route::get('/blog/post/',[App\Http\Controllers\BlogController::class,'blogpost']);





    //contact message management
    Route::get('comtact/messages',[App\Http\Controllers\Admin\Contact\AdminContactController::class,'contactmessage']);
    Route::get('/contact/messages',[App\Http\Controllers\Admin\Contact\AdminContactController::class,'contactmessages']);
    Route::get('/contact/message/seen/{id}',[App\Http\Controllers\Admin\Contact\AdminContactController::class,'seenmessage']);
    Route::get('/contact/message/unseen/{id}',[App\Http\Controllers\Admin\Contact\AdminContactController::class,'makeunseen']);

    });


// Route for Frontend User Access Management
    //forntview management
    Route::get('/' ,[App\Http\Controllers\FrontendController::class,'index'])
   ->name('front.home');

    Auth::routes(['verify' => true]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/user_custom/', [App\Http\Controllers\HomeController::class, 'userlogin'])
    ->name('user_custom');
    Route::get('/user/registration/', [App\Http\Controllers\HomeController::class, 'userregister'])
    ->name('user.register');
    Route::POST('/user/registration/post/', [App\Http\Controllers\HomeController::class, 'registerpost'])
    ->name('register.post');
    Route::get('/user/order/details/{order_id}', [App\Http\Controllers\HomeController::class, 'orderdetail']);
    Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('user.logout');
    Route::get('change/password', [App\Http\Controllers\HomeController::class, 'change_password'])
    ->name('change.password');
    Route::POST('update/password', [App\Http\Controllers\HomeController::class, 'update_password'])
    ->name('update.password');
    Route::POST('/user/profile_image/update/{id}', [App\Http\Controllers\HomeController::class, 'userprofileimageupdate']);




  //route for checkout Controller 
  Route::post('/checkout/',[App\Http\Controllers\Checkout\CheckoutController::class,'checkout'])
  ->name('checkout');
  Route::post('/final_step/',[App\Http\Controllers\Checkout\CheckoutController::class,'payment'])
  ->name('final_step');
  //Route for stripe payment 
  Route::get('stripe',[App\Http\Controllers\StripePaymentController::class,'stripe']);
  Route::post('stripe',[App\Http\Controllers\StripePaymentController::class,'stripePost'])
  ->name('stripe.post');



//route for socialite
Route::get('login/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback']);
// localization magement
Route::get('/local/{local}',[App\Http\Controllers\BlogController::class,'switch']);
//newsletter management
Route::POST('/add/newsletter/',[App\Http\Controllers\NewsLetterController::class,'addnewsletter']);



// Route for contact
Route::get('/user/contact/',[App\Http\Controllers\ContactController::class,'contact']);
Route::POST('/send/message/',[App\Http\Controllers\ContactController::class,'sendmessage']);
// rotue for shop controller 
Route::get('/shop/page/',[App\Http\Controllers\ShopController::class,'shoppage']);
Route::get('/category/shop/products/{id}',[App\Http\Controllers\ShopController::class,'categoryshopproducts']);
Route::get('/brand/shop/products/{id}',[App\Http\Controllers\ShopController::class,'brandshopproducts']);
// Route for stockcontroller 
Route::get('/admin/stock/management/',[App\Http\Controllers\Admin\Stock\stockController::class,'stock']);




    // product management
    Route::get('/productview/{id}', [App\Http\Controllers\User\UserController::class, 'productview']);
    Route::POST('search/product', [App\Http\Controllers\User\UserController::class, 'search']);
    Route::POST('/find/product/', [App\Http\Controllers\User\UserController::class, 'findproduct']);
    Route::get('/subcategory/product/show/{id}',[App\Http\Controllers\User\UserController::class,
      'subcategoryshow']);
    // district management
    Route::get('/get_district/{division_id}',[App\Http\Controllers\User\UserController::class,'getdistrict']);
    // area management
    Route::get('/get_area/{district_id}',[App\Http\Controllers\User\UserController::class,'getarea']);
    Route::get('/singleproduct/{id}', [App\Http\Controllers\User\UserController::class, 'singleproduct'])
    ->name('singleproduct.show');
    // route for user  category
    Route::get('category/page/{id}',[App\Http\Controllers\User\UserController::class,'categoryshow'])
    ->name('category.show');



   //cart management
    Route::get('/add/cart/{id}',[App\Http\Controllers\Cart\CartController::class,'addcart'])
    ->name('cart.added');
    Route::get('/cart_show',[App\Http\Controllers\Cart\CartController::class,'cart_show'])
    ->name('cart.show');
    Route::POST('/applycouponn/',[App\Http\Controllers\Cart\CartController::class,'appcoupon']);
    Route::get('/cartdata/',[App\Http\Controllers\Cart\CartController::class,'alldata']);
    Route::get('/increment/{rowId}',[App\Http\Controllers\Cart\CartController::class,'increment']);
    Route::get('/decrement/{rowId}',[App\Http\Controllers\Cart\CartController::class,'decrement']);
    Route::get('/cartremove/{rowId}',[App\Http\Controllers\Cart\CartController::class,'destroy']);
    Route::get('/cartcal/',[App\Http\Controllers\Cart\CartController::class,'cartcal']);
    Route::get('/couponremove/',[App\Http\Controllers\Cart\CartController::class,'couponremove']);
    Route::get('/minicart/',[App\Http\Controllers\Cart\CartController::class,'minicart']);
    Route::post('/addtocart/',[App\Http\Controllers\Cart\CartController::class,'addtocart'])
    ->name('addto.cart');


  //wishlist management
   Route::get('/wishlist/added/{id}',[App\Http\Controllers\Wishlist\WishlistController::class,'addwishlist'])
   ->name('wish.added');
   Route::get('/wishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'wishlist'])
   ->name('wish.list');
   Route::get('/wishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'wishlist'])
   ->name('wish.list');
   Route::get('/addwishlistt/{id}',[App\Http\Controllers\Wishlist\WishlistController::class,'wishlistt']);
  Route::get('/miniwishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'miniwishlist']);
  Route::get('/user/wishlist/',[App\Http\Controllers\Wishlist\WishlistController::class,'userwishlist']);


