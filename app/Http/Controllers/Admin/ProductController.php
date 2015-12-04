<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Route;

class ProductController extends AdminController
{

	public function index()
	{
		var_dump(Route::current()->getPrefix());
		return view('admin.pages.product.list');
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		var_dump(Route::current()->getUri());
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
