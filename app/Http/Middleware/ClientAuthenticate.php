<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class ClientAuthenticate
{
	protected $auth;

	public function __construct()
	{
		$this->auth = Auth::client();
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ($this->auth->guest())
		{
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			} else
			{
				return redirect()->guest('auth/login');
			}
		}

		return $next($request);
	}

}
