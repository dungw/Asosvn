<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;

class CurrencyController extends Controller
{

	public function changeTo($currency)
	{

		Session::push('currency', $currency ? $currency : \Config::get('currency_default'));

		return redirect('/');
	}

}
