<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Login customer user
	 * @param Request $request
	 * @return array
	 */
	public function login(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required'
		]);

		$user = User::where('email', $request->get('email'))->first();
		$code = array();

		if ($user && password_verify($request->get('password'), $user->password)) {
			Auth::login($user);
			$code = $user;
			$code['code'] = 'success';
		}

		return $code;
	}

	/**
	 * get Logged in user
	 * @return array|string
	 */
	public function loggedIn()
	{
		if (Auth::guest()) {
			return [];
		}

		return json_encode(Auth::user());
	}

	/**
	 * log out user
	 * @return array
	 */
	public function logout()
	{
		Auth::logout();
		return [];
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'name' => 'required', 'password' => 'required'
		]);

		if ($this->checkExist($request->get('email'))) {
			return array(
				'messageEmail'	=> 'Email already has been taken!'
			);
		}

		$user = User::create([
			'name' => trim($request->get('name')),
			'email' => trim($request->get('email')),
			'password' => bcrypt(trim($request->get('password'))),
		]);

		if ($user->id) {
			return json_encode($user);
		}

		return [];
	}

	/**
	 * Check account exist by email
	 * @param $email
	 * @return bool
	 */
	public function checkExist($email)
	{
		$user = User::where('email', $email)->first();
		if ($user) {
			return true;
		}

		return false;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
