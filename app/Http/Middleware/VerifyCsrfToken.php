<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{

	public function handle($request, Closure $next)
	{
		if ($this->excludedRoutes($request))
		{
			return $this->addCookieToResponse($request, $next($request));
		}

		return parent::handle($request, $next);
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
