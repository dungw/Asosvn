<?php namespace App\Helpers;

use Session;
use Config;

class Locale
{
	public static function lang()
	{
		$currentLang = Session::get('lang') ? Session::get('lang') : Config::get('app.locale');

		return $currentLang;
	}

}
