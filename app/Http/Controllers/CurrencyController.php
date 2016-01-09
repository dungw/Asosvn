<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Config;
use URL;

class CurrencyController extends Controller
{

	/**
	 * Set new currency
	 * @param $currency
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function changeTo($currency)
	{
		if ($currency && in_array($currency, Config::get('app.currency'))) {
			Session::set('currency', $currency);
		} else {
			Session::set('currency', Config::get('app.currency_default'));
		}

		return redirect(URL::previous());
	}

}
