<?php

//APIs
Route::post('api/product/store', 'Admin\ProductController@store');

//---------------------------- FRONT-END ROUTE -------------------------------

//Customer Account
Route::get('account', 'AccountController@index');
Route::post('account/login', 'AccountController@login');
Route::get('account/logout', 'AccountController@logout');
Route::get('account/dashboard', 'AccountController@dashboard');
Route::get('account/order', 'AccountController@order');
Route::post('account/update', 'AccountController@update');

//Facebook Login
Route::get('facebook/auth', 'FacebookController@auth');
Route::get('facebook/login', 'FacebookController@login');

//Google Login
Route::get('google/auth', 'GoogleController@auth');
Route::get('google/login', 'GoogleController@login');

//Product
Route::get('product/{slug}', 'ProductController@details');
Route::get('c/{category_slug}', 'ProductController@category');
Route::get('b/{brand_slug}', 'ProductController@brand');

//Cart
Route::get('cart', 'CartController@index');
Route::post('cart/add', 'CartController@add');
Route::get('cart/qty/{rowId}', 'CartController@qty');
Route::get('cart/totalQty', 'CartController@totalQty');
Route::get('cart/update-menu', 'CartController@updateMenu');
Route::get('cart/update-total', 'CartController@updateTotal');
Route::post('cart/update-qty', 'CartController@updateQty');
Route::post('cart/qty-up/{rowId}', 'CartController@qtyUp');
Route::post('cart/qty-down/{rowId}', 'CartController@qtyDown');
Route::delete('cart/remove/{rowId}', 'CartController@remove');

//Order
Route::resource('order', 'OrderController');

//Currency
Route::get('currency/{currency}', 'CurrencyController@changeTo');

//Language
Route::get('language/{lang}', 'LanguageController@changeTo');

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

//Checkout
Route::get('checkout', 'CheckoutController@index');
Route::get('checkout/custom', 'CheckoutController@index');
Route::post('checkout/create', 'CheckoutController@create');

//Auth
Route::controllers([
	'auth'          => 'Auth\AuthController',
	'password'      => 'Auth\PasswordController',
]);

//Blog, CMS page
Route::get('blog/list', 'BlogController@showAll');
Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@detail');

//Contact
Route::get('contact', 'CmsController@contact');
Route::post('contact/create', 'CmsController@create');

//---------------------------- BACK-END ROUTE -------------------------------

//Auth
Route::get('admin', 'Admin\IndexController@index');
Route::get('admin/auth', 'Admin\AuthController@index');
Route::post('admin/auth/login', 'Admin\AuthController@login');
Route::get('admin/auth/logout', 'Admin\AuthController@logout');

//Resource
Route::resource('admin/product', 'Admin\ProductController');
Route::resource('admin/category', 'Admin\CategoryController');
Route::resource('admin/brand', 'Admin\BrandController');
Route::resource('admin/order', 'Admin\OrderController');
Route::resource('admin/blog', 'Admin\BlogController');

//Other route
Route::put('admin/product/{product}/delete-image/{image}', 'Admin\ProductController@deleteImage');
Route::post('admin/product/generate-slug', 'Admin\ProductController@generateSlug');
Route::post('admin/category/generate-slug', 'Admin\CategoryController@generateSlug');
Route::post('admin/brand/generate-slug', 'Admin\BrandController@generateSlug');
Route::get('admin/order/status/{status?}', 'Admin\OrderController@filter');
Route::get('admin/user/{type?}', 'Admin\UserController@index');
Route::get('admin/contact', 'Admin\CmsController@contact');
Route::post('admin/blog/generate-slug', 'Admin\BlogController@generateSlug');



