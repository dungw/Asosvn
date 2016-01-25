<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AccountController extends Controller {


	use AuthenticatesAndRegistersUsers;

	protected $loginPath = 'account';

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function index()
	{
		return view('pages.account.login');
	}

	public function login(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$credentials = $request->only('email', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
			->withInput($request->only('email', 'remember'))
			->withErrors([
				'email' => $this->getFailedLoginMessage(),
			]);
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/');
	}

	public function dashboard()
	{
		return view('pages.account.dashboard');
	}

}
