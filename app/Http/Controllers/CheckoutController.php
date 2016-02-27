<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;

use App\Order;
use App\OrderItem;
use App\OrderCustom;
use App\OrderCustomImage;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use URL;
use App\Helpers\ImageManager;
use App\Events\OrderWasPlaced;

class CheckoutController extends BaseController
{

	public function index()
	{
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

		if ($request->get('url') || $request->hasFile('file')) {
			//Custom Order
			$order = Order::create($request->all());

			if (Auth::user()) {
				$order->user_id = Auth::id();
			}
			$order->type = ORDER_CUSTOM;
			$order->status = ORDER_PENDING;
			$order->save();

			//fire order created event
			event(new OrderWasPlaced($order));

			$orderCustom = OrderCustom::create([
				'order_id'	=> $order->id,
				'url'		=> $request->get('url') ? $request->get('url') : '',
			]);

			if ($request->hasFile('file')) {
				$images = $request->file('file');
				foreach ($images as $image) {
					//upload images
					$fileName = ImageManager::upload($image, 'order');

					//insert to database
					OrderCustomImage::create([
						'order_custom_id'	=> $orderCustom->id,
						'image'				=> $fileName,
					]);
				}

			}

			return view('pages.checkout.success')->with('order_id', $order->id);

		} elseif (Cart::count()) {
			//Normal Order
			$order = Order::create($request->all());

			if (Auth::user()) {
				$order->user_id = Auth::id();
			}

			$order->total_amount = Cart::total() + $shippingFee;
			$order->type = ORDER_NORMAL;
			$order->status = ORDER_PENDING;

			$order->save();

			//fire order created event
			event(new OrderWasPlaced($order));

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

		return redirect(URL::previous())
			->withInput()
			->withErrors([
				'message' => 'Can not create new order.',
			]);
	}

}
