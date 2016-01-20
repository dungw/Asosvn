<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;

class AccountController extends Controller {

	public function index()
	{
		return view('pages.login');
	}

	public function logout()
	{
		\Auth::logout();

		return redirect('/');
	}

}
