<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends BaseController
{

	public function index()
	{
		return view('pages.checkout.success')->with('order_id', 1);
		return view('pages.checkout.index');
	}

	public function create(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'phone' => 'required',
			'name' => 'required', 'address' => 'required',
		]);

		//todo: calculate shipping fee and fix this
		$shippingFee = $request->get('shipping_fee') ? $request->get('shipping_fee') : 0;

		if (Cart::count()) {
			$order = Order::create($request->all());

			if (Auth::user()) {
				$order->user_id = Auth::id();
			}
			$order->total_amount = Cart::total() + $shippingFee;
			$order->save();

			$cart = Cart::content();
			foreach ($cart as $item) {
				OrderItem::create(array(
						'order_id'	 => $order->id,
						'product_id' => $item->id,
						'quantity'	 => $item->qty,
						'price'  	 => $item->price
					));
			}
			Cart::destroy();

			return view('pages.checkout.success')->with('order_id', $order->id);
		}

		return redirect('checkout')
			->withInput()
			->withErrors([
				'message' => 'Can not create new order.',
			]);
	}

}
