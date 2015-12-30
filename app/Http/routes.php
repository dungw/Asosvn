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

//Frontend routes
Route::get('404', function() {
	return view('layouts.404');
});
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('category/{category_slug}', 'ProductController@category');
Route::get('product/{id}/{alias}', 'ProductController@details');
Route::controllers([
	'checkout'  => 'CheckoutController',
	'cart'      => 'CartController',
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
Route::put('admin/product/{product}/delimage/{image}', 'Admin\ProductController@deleteImage');
Route::post('admin/product/generate-slug', 'Admin\ProductController@generateSlug');
Route::post('admin/category/generate-slug', 'Admin\CategoryController@generateSlug');





