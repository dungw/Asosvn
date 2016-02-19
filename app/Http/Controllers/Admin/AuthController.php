<?php namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{

	public function index()
	{
		return view('admin.pages.login');
	}

	public function login(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required'
		]);

		$user = User::where('email', $request->get('email'))->first();

		if ($user) {
			if ($user->id && $user->is_admin && password_verify($request->get('password'), $user->password)) {
					Auth::login($user);
					return redirect('/admin');
				}
		}		

		return redirect('/admin/auth')
			->withInput($request->only('email', 'remember'))
			->withErrors([
				'name' => $this->getFailedLoginMessage(),
			]);
	}

	public function logout()
	{
		Auth::logout();

		return redirect('/admin/auth');
	}

	protected function getFailedLoginMessage()
	{
		return 'Username or password is wrong!';
	}

}