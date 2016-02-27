<?php namespace App\Handlers\Events;

use App\Events\OrderWasPlaced;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Mail;

class EmailThankForPlacedOrder implements ShouldBeQueued 
{

	/**
	 * Create the event handler.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Handle the event.
	 *
	 * @param  OrderWasPlaced  $event
	 * @return void
	 */
	public function handle(OrderWasPlaced $event)
	{
		$orderData = $event->order->getAttributes();
		
		Mail::send('emails.welcome', ['orderId' => $orderData['id']], function($message)
		{
		    $message->to($orderData['email'],  $orderData['name'])->subject('SALE-ZONE.VN - ' . trans('lang.thank_you_for_your_order'));
		});
	}

}
