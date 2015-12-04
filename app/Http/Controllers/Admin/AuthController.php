<?php namespace App\Http\Controllers\Admin;

use Auth;
use App\Http\Controllers\Controller;
use App\Services\AdminRegistrar as Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	protected $redirectAfterLogout = 'admin/auth/login';

	use AuthenticatesAndRegistersUsers;

	public function __construct(Registrar $registrar)
	{
		$this->auth = Auth::admin();
		$this->registrar = $registrar;
		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function getRegister()
	{
		return view('admin.pages.register');
	}

	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}

		$this->auth->login($this->registrar->create($request->all()));

		return redirect($this->redirectPath());
	}

	public function getLogin()
	{
		return view('admin.pages.login');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'name' => 'required', 'password' => 'required',
		]);

		$credentials = $request->only('name', 'password');

		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			return redirect()->intended($this->redirectPath());
		}

		return redirect($this->loginPath())
			->withInput($request->only('name', 'remember'))
			->withErrors([
				'name' => $this->getFailedLoginMessage(),
			]);
	}

}