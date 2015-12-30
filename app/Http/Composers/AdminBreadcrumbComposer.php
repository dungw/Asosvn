<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Route;

class AdminBreadcrumbComposer
{

	public function compose(View $view)
	{
		$action = Route::current()->getAction()['as'];
		$actions = explode('.', $action);

		$headingText = ucfirst($action[1]);
		$breadcrumb = [
			[
				'url'   => Route::current()->getUri(),
				'name'  => $actions[1]
			],
			[
				'url'   => '#',
				'name'  => '',
			]
		];

		$view->with('headingText', $headingText);
		$view->with('breadcrumb', $breadcrumb);
	}
	
}

