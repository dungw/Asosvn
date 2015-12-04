<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CheckoutController extends BaseController
{

	public function index()
	{
		return view('pages.checkout');
	}

}
