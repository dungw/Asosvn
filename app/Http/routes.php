<?php

//APIs
Route::post('api/product/store', 'Admin\ProductController@store');

//Customer Account
Route::get('account', 'AccountController@index');
Route::get('account/logout', 'AccountController@logout');
Route::get('account/dashboard', 'AccountController@dashboard');

//Facebook Login
Route::get('facebook/auth', 'FacebookController@auth');
Route::get('facebook/login', 'FacebookController@login');

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

//Currency
Route::get('currency/{currency}', 'CurrencyController@changeTo');

//Language
Route::get('language/{lang}', 'LanguageController@changeTo');

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::controllers([
	'checkout'  => 'CheckoutController',
	'blog'      => 'BlogController',
]);

//Auth
Route::controllers([
	'auth'          => 'Auth\AuthController',
	'password'      => 'Auth\PasswordController',
]);

//Backend routes
Route::get('admin', 'Admin\IndexController@index');
Route::get('admin/auth', 'Admin\AuthController@index');
Route::post('admin/auth/login', 'Admin\AuthController@login');
Route::get('admin/auth/logout', 'Admin\AuthController@logout');

Route::resource('admin/product', 'Admin\ProductController');
Route::resource('admin/category', 'Admin\CategoryController');
Route::resource('admin/brand', 'Admin\BrandController');

Route::put('admin/product/{product}/delete-image/{image}', 'Admin\ProductController@deleteImage');
Route::post('admin/product/generate-slug', 'Admin\ProductController@generateSlug');
Route::post('admin/category/generate-slug', 'Admin\CategoryController@generateSlug');
Route::post('admin/brand/generate-slug', 'Admin\BrandController@generateSlug');





