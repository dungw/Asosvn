<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function auth()
	{
		return Socialite::driver('facebook')->redirect();
	}

	public function login()
	{
		$fb_user = Socialite::driver('facebook')->user();

		$user = User::where('email', $fb_user->getEmail())->first();
		if (!$user) {
			$info = array(
				'email'  => $fb_user->getEmail(),
				'name'   => $fb_user->getName(),
			);
			$user = User::create($info);
		} else {
			if ($user->name != $fb_user->getName()) {
				$user->name = $fb_user->getName();
				$user->save();
			}
		}

		$this->auth->login($user, true);

		return redirect('/');
	}

}
