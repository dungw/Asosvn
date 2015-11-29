<?php

return [

	/*'driver' => 'eloquent',
	'model' => 'App\User',
	'table' => 'users',*/

	'multi' => [
		'admin' => [
			'driver' => 'eloquent',
			'model' => 'App\Admin',
		],
		'client' => [
			'driver' => 'database',
			'table' => 'clients',
			'email' => 'client.emails.password',
		]
	],

	'password' => [
		'email' => 'emails.password',
		'table' => 'password_resets',
		'expire' => 60,
	],

];
