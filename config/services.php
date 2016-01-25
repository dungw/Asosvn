<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

	'facebook' => [
		'client_id' => '1540297046283675',
		'client_secret' => env('FB_SECRET'),
		'redirect' => 'http://salezone.vn/facebook/login',
	],

	'google' => [
		'client_id' => '956512791132-4dcftfe6e34df8b3dvat5rktgt4esin9.apps.googleusercontent.com',
		'client_secret' => env('GG_SECRET'),
		'redirect' => 'http://salezone.vn/google/login',
	]

];
