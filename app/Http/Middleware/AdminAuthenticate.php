<?php namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class AdminAuthenticate
{
	protected $auth;

	public function __construct()
	{
		$this->auth = Auth::admin();
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
		if ($this->excludedRoutes($request))
		{
			return $next($request);
		} else
		{
			if ($this->auth->guest())
			{
				if ($request->ajax())
				{
					return response('Unauthorized.', 401);
				} else
				{
					return redirect()->guest('admin/auth/login');
				}
			}
		}
		return $next($request);
	}

	/**
	 * Function check if request is an API, then pass the CSRF verification
	 *
	 * @param $request
	 * @return bool
	 */
	protected function excludedRoutes($request)
	{
		$listAPI = ['api/product/store'];

		foreach ($listAPI as $api)
		{
			if ($request->is($api))
			{
				return true;
			}
		}

		return false;
	}

}
