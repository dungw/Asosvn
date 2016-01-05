<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Cart;

class CartComposer
{

	public function compose(View $view)
	{
		$cartQty = Cart::count();

		$view->with('cartQty', $cartQty);
	}
}