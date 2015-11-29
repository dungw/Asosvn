<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

	public function index()
	{
		return view('pages.products');
	}

	public function details($id, $alias)
	{
		return view('pages.product-details');
	}

}
