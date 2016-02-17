<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use App\User;

class UserController extends AdminController {

	public function index($type = 'all')
	{
		if ($type == 'all') {
			$data['users'] = User::all();
		} elseif ($type == 'social') {
			$data['users'] = User::where('password', '')->get();
		} elseif ($type == 'register') {
			$data['users'] = User::where('password', '<>', '')->get();
		}

		$data['type'] = $type;

		return view('admin.pages.user.list', $data);
	}

}
