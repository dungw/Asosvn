<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Contracts\Auth\Guard;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller {

	protected $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	public function auth()
	{
		return Socialite::driver('google')->redirect();
	}

	public function login()
	{
		$gg_user = Socialite::driver('google')->user();

		$user = User::where('email', $gg_user->getEmail())->first();
		if (!$user) {
			$info = array(
				'email'  => $gg_user->getEmail(),
				'name'   => $gg_user->getName(),
			);
			$user = User::create($info);
		} else {
			if ($user->name != $gg_user->getName()) {
				$user->name = $gg_user->getName();
				$user->save();
			}
		}

		$this->auth->login($user, true);

		return redirect('/');
	}

}
