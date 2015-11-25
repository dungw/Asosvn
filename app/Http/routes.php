<?php
//Frontend routes
Route::get('/', function() {
	return view('pages.home');
});
Route::get('home', 'HomeController@index');

//Backend routes
Route::get('admin', function() {
	return view('admin.layouts.default');
});
Route::resource('admin/product', 'Admin\ProductController');

//Common routes
Route::controllers([
	'auth'          => 'Auth\AuthController',
	'password'      => 'Auth\PasswordController',
	'admin/product' => 'Admin\ProductController',
]);