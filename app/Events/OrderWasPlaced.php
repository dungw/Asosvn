<?php namespace App\Events;

use App\Events\Event;

use Illuminate\Queue\SerializesModels;

use App\Order;

class OrderWasPlaced extends Event {

	use SerializesModels;

	public $order;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(Order $order)
	{
		$this->order = $order;
	}

}
