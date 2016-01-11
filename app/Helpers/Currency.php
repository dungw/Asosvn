<?php namespace App\Helpers;

use NumberFormatter;
use Session;
use Config;

class Currency
{
	public static function currency($price)
	{
		$currentCurrency = Session::get('currency') ? Session::get('currency') : Config::get('app.currency_default');
		$rate = Config::get('app.currency_rate_' . Config::get('app.currency_default'). '_to_' . $currentCurrency);

		$finalPrice = $price * $rate;
		switch ($currentCurrency) {
			case 'VND':
				$fmt = new NumberFormatter('vi_VN', NumberFormatter::CURRENCY);
				break;
			case 'USD':
				$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
				break;
			default:
				$fmt = new NumberFormatter('en_US', NumberFormatter::CURRENCY);
				break;
		}

		return  $fmt->formatCurrency($finalPrice, $currentCurrency);
	}

}
