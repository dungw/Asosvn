<?php namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Event;
use Illuminate\Support\Facades\Session;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'App\Events\OrderWasPlaced' => [
        	'App\Handlers\Events\EmailThankForPlacedOrder',
    	],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		Event::listen('cart.add', function($event) {
			if ($event) {
				Session::flash('cart-add', 'success');
			}
		});
	}

}
