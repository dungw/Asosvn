<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		View::composers([
			'App\Http\Composers\AdminBreadcrumbComposer' => 'admin.includes.boxed.breadcrumb',
			'App\Http\Composers\SidebarComposer'         => 'includes.default.left-sidebar',
		]);
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

}
