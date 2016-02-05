<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CmsController extends Controller {

	public function contact()
	{
		return view('cms.contact');
	}
}
