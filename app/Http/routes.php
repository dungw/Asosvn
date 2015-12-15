<?php

//other method should be define before resource controller
//variable in template compact by Laravel change symbol to get value
Blade::setContentTags('<%', '%>');
Blade::setEscapedContentTags('<%%', '%%>');

//Frontend routes
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('products', 'ProductController@index');
Route::get('product/{id}/{alias}', 'ProductController@details');
Route::get('products/{id}', 'ProductController@category');
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
Route::put('admin/product/{product}/delimage/{image}', 'Admin\ProductController@delimage');


