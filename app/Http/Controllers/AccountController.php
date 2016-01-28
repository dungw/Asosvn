<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use URL;

class AccountController extends Controller {


	use AuthenticatesAndRegistersUsers;

	protected $loginPath = 'account';

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function index()
	{
		if (Auth::user()) {
			return redirect('account/dashboard');
		}

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
		if (Auth::guest()) {
			return redirect('account');
		}

		return view('pages.account.dashboard');
	}

	public function order()
	{
		if (Auth::guest()) {
			return redirect('account');
		}

		return view('pages.account.order');
	}

	public function update(Request $request)
	{
		if (Auth::guest()) {
			return redirect('account');
		}

		$this->validate($request, [
			'email' => 'required|email', 'name' => 'required',
		]);

		$data = array(
			'phone'   => trim($request->get('phone')),
			'address' => trim($request->get('address')),
		);

		if (Auth::user()->password) {
			$email = trim($request->get('email'));			
			if ($email != Auth::user()->email) {
				$user = User::where('email', $email)->first();
				if ($user) {
					return redirect('account/dashboard')->withErrors([
							'email' => 'The email has already been taken.'
						]);	
				}
				$data['email'] = $email;	
			}
			$data['name'] = trim($request->get('name'));
		}

		$user = User::find(Auth::id());
		$user->update($data);

		return $this->index();
	}

}
