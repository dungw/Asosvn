<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Config;
use URL;
use Session;

class LanguageController extends Controller {

	/**
	 * update language
	 * @param $lang
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function changeTo($lang)
	{
		if ($lang && in_array($lang, Config::get('app.language'))) {
			Session::set('lang', $lang);
		}

		return redirect(URL::previous());
	}

}
