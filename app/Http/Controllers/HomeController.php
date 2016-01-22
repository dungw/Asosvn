<?php namespace App\Http\Controllers;

use App\Product;

class HomeController extends Controller
{

	public function __construct()
	{

	}

	public function index()
	{
		$data['latestProducts'] = Product::latest()->limit(6)->get();

		return view('pages.home', $data);
	}

}
