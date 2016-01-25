<?php namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * Using for check admin
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::check() && Auth::user()->is_admin) {
			return $next($request);
		}

		return response("You don't have permission to access this page!", 401);
	}

}
