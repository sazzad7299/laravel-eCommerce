<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
//Listing Home Page
// Route::match(['get','post'],'/login','Auth/LoginController@login');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','IndexController@index');
// Admin Controlling
Route::match(['get','post'],'/admin','AdminController@login');
Route::get('/admin/dashboard','AdminController@dashboard');

//listing pages by Category
Route::get('/products/{url}', 'ProductsController@products');
//search product
Route::post('/search-product','ProductsController@productSearch');
//Products Details page
Route::get('/product/{id}','ProductsController@product');

//add-to-cart page
Route::match(['get','post'],'/add-cart','ProductsController@addToCart');
// cart page
Route::match(['get','post'],'/cart','ProductsController@cart');
//Update Quantity in cart Page
Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');
//delete product from cart page
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartItem');
//Get Product Attribute Price
Route::get('/get-product-price','ProductsController@getProductPrice');
//Apply Coupon Code
Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

//User Login-Register Form
Route::get('/login-register','UsersController@loginUser');

// New User Registration
Route::post('/user-register','UsersController@register');
// Register User Email Validation
Route::match(['get', 'post'], '/confirm/{code}','UsersController@confirmAccount');

//User login form submit
Route::post('/user-login','UsersController@login');
// Forgot password section
Route::match(['get','post'],'/forgot-password','UsersController@forgotPassword');


//check-email unique\
Route::match(['get', 'post'], '/check-email', 'UsersController@checkEmail');
//check login email exist or not
Route::match(['get', 'post'], '/check-login-email', 'UsersController@existEmail');

//User middleware controlling
Route::group(['middleware'=>['frontlogin']],function(){
	Route::match(['get', 'post'], 'user/account','UsersController@account');
	Route::get('/user/check_pwd','UsersController@chkPassword');
	Route::post('/user/update-password','UsersController@updatePassword');

	//user access
	Route::get('/myaccount/orders','UsersController@orders');
	Route::get('/myaccount/orders/{id}','UsersController@orderDetails');

	//product checkout process
	Route::match(['get','post'],'checkout','ProductsController@checkout');
	Route::match(['get', 'post'], '/order-review','ProductsController@orderReview');
	Route::match(['get', 'post'], '/place-order','ProductsController@placeOrder');
	Route::get('/success','ProductsController@success');
});


//user logout funtionality
Route::get('/user-logout','UsersController@logout');

Route::group(['middleware'=>['adminlogin']],function(){
	// Route::get('/admin','AdminController@dashboard');
	Route::get('/admin/dashboard','AdminController@dashboard');
	Route::get('/admin/settings','AdminController@settings');
	Route::get('/admin/check_pwd','AdminController@chkPassword');
	Route::match(['get','post'],'/admin/update_pwd','AdminController@updatePassword');

	// Banner Controlling
	Route::match(['get','post'],'/admin/add-banner','BannerController@addBanner');
	Route::match(['get','post'],'/admin/edit-banner/{id}','BannerController@editBanner');
	Route::get('/admin/view-banners','BannerController@viewBanners');
	Route::match(['get','post'],'/admin/delete-banner/{id}','BannerController@deleteBanner');

	//category controlling
	Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
	Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
	Route::get('/admin/view-categories','CategoryController@viewCategory');
	Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');

	//Product controlling

	Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
	Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
	Route::get('/admin/view-products','ProductsController@viewProducts');
	Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
	Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');
	
	//Orders Controlling
	Route::get('/admin/view-orders','ProductsController@viewOrders');
	Route::get('/admin/order-details/{id}','ProductsController@orderDetails');
	Route::get('/admin/order-invoice/{id}','AdminController@orderInvoice');
	// update status
	Route::get('/admin/order-details/{id}/{status}','ProductsController@orderStatus');

	//Attribute controlling

	Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');
	Route::match(['get','post'],'/admin/edit-attributes/{id}','ProductsController@editAttributes');
	Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');
	//Alternative Image Add and Delete
	Route::match(['get','post'],'/admin/add-images/{id}','ProductsController@addImages');
	Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');

	//Coupons Routers:
	Route::match(['get', 'post'], '/admin/add-coupon','CouponController@addCoupon');
	Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponController@editCoupon');
	Route::get('/admin/view-coupons','CouponController@viewCoupons');

	Route::get('/admin/delete-coupon/{id}','CouponController@deleteCoupon');

	//User Routes
	Route::get('/admin/view-users','AdminController@viewUsers');

	//CMS PAGES
	Route::match(['get', 'post'], '/admin/add-cms','CmsController@addPage');
	Route::get('/admin/view-cms','CmsController@viewPage');
	Route::match(['get', 'post'], '/admin/edit-cms/{id}','CmsController@editPage');
	Route::get('/admin/delete-cms/{id}','CmsController@deletePage');

	


});
Route::get('/logout','AdminController@logout');

// Display CMS PAGES infront
Route::match(['get', 'post'], '/{url}','CmsController@cmsPages');


// SSLCOMMERZ Start

Route::get('/example2', 'SslCommerzPaymentController@exampleHostedCheckout');

Route::post('/pay', 'SslCommerzPaymentController@index');

Route::post('/success', 'SslCommerzPaymentController@success');
Route::post('/fail', 'SslCommerzPaymentController@fail');
Route::post('/cancel','SslCommerzPaymentController@cancel');

Route::post('/ipn','SslCommerzPaymentController@ipn');
//SSLCOMMERZ END

