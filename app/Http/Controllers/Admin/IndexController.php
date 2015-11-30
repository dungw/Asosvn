<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Auth;
use Illuminate\Http\Request;

class IndexController extends AdminController {

	public function index()
	{
		return view('admin.layouts.default');
	}

}
