<?php

//APIs
Route::post('api/product/store', 'Admin\ProductController@store');

//User routes
Route::resource('user', 'UserController');
Route::post('user/login', 'UserController@login');
Route::get('user/logged-in', 'UserController@loggedIn');
Route::get('user/logout', 'UserController@logout');

//Product
Route::get('product/{slug}', 'ProductController@details');

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
Route::get('c/{category_slug}', 'ProductController@category');
Route::get('b/{brand_slug}', 'ProductController@brand');
Route::get('product/{id}/{alias}', 'ProductController@details');
Route::controllers([
	'checkout'  => 'CheckoutController',
	'blog'      => 'BlogController',
]);

//Backend routes
Route::get('admin', 'Admin\IndexController@index');
Route::controllers([
	'auth'          => 'Auth\AuthController',
	'password'      => 'Auth\PasswordController',
	'admin/auth'    => 'Admin\AuthController',
]);

Route::resource('admin/product', 'Admin\ProductController');
Route::resource('admin/category', 'Admin\CategoryController');
Route::resource('admin/brand', 'Admin\BrandController');

Route::put('admin/product/{product}/delete-image/{image}', 'Admin\ProductController@deleteImage');
Route::post('admin/product/generate-slug', 'Admin\ProductController@generateSlug');
Route::post('admin/category/generate-slug', 'Admin\CategoryController@generateSlug');
Route::post('admin/brand/generate-slug', 'Admin\BrandController@generateSlug');





