<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Requests;

use Illuminate\Http\Request;

class IndexController extends BaseController {

	public function index()
	{
		return view('admin.layouts.default');
	}

}
