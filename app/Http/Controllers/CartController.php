<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Cart;
use Session;
use App\Helpers\Currency;

class CartController extends Controller
{

	/**
	 * get view cart page
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		$cart = Cart::content();
		$total = Cart::total();

		return view('pages.cart', compact('cart', 'total'));
	}

	/**
	 * get item quantity
	 * @return mixed
	 */
	public function qty($rowId)
	{
		$item = Cart::get($rowId);

		return $item->qty;
	}

	/**
	 * get total cart quantity
	 * @return mixed
	 */
	public function totalQty()
	{
		return Cart::count();
	}

	/**
	 * add product to cart
	 * @param Request $request
	 * @return string
	 */
	public function add(Request $request)
	{
		$id = $request->get('id');
		if ($id) {
			$name = $request->get('name');
			$qty = $request->get('qty');
			$price = $request->get('price');
			$options = array(
				'slug'  => $request->get('slug'),
				'image' => $request->get('image'),
				'sku'   => $request->get('sku'),
			);

			Cart::add(array('id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'options' => $options));
			if (Session::has('cart-add') && Session::get('cart-add') == 'success') {
				return 'success';
			} else {
				return 'error';
			}
		} else {
			return 'error';
		}
	}

	/**
	 * remove a product from cart
	 * @param $rowId
	 * @return array
	 */
	public function remove($rowId)
	{
		Cart::remove($rowId);

		return array(
			'qty' 	=> count(Cart::content()),
			'rowId' => $rowId
		);
	}

	/**
	 * Update shop menu when cart update
	 * @return \Illuminate\View\View
	 */
	public function updateMenu()
	{
		return view('includes.default.shop-menu');
	}

	/**
	 * update cart total area after cart update
	 * @return $this
	 */
	public function updateTotal()
	{
		return view('pages.cart-total-area')->with('total', Cart::total());
	}

	/**
	 * update quantity of item in cart
	 * @param Request $request
	 * @return array
	 */
	public function updateQty(Request $request)
	{
		$rowId = $request->get('rowId');
		$qty = $request->get('qty');

		if ($qty) {
			Cart::update($rowId, $qty);
		} else {
			return array('error' => 'Cannot update item quantity!');
		}

		$item = Cart::get($rowId);

		return array(
			'qty' 			=> $item->qty,
			'totalPrice'	=> Currency::currency($item->qty*$item->price),
		);

	}

	/**
	 * Increase cart item by 1
	 * @param $rowId
	 * @return array
	 */
	public function qtyUp($rowId)
	{
		$item = Cart::get($rowId);

		Cart::update($rowId, $item->qty + 1);

		return array(
			'qty' 			=> $item->qty,
			'totalPrice'	=> Currency::currency($item->qty*$item->price),
		);
	}

	/**
	 * Decrease cart item by 1
	 * @param $rowId
	 * @return array
	 */
	public function qtyDown($rowId)
	{
		$item = Cart::get($rowId);

		if ($item->qty == 1) {
			Cart::remove($rowId);
			return array('empty' => true);
		}

		Cart::update($rowId, $item->qty - 1);

		return array(
			'qty' 			=> $item->qty,
			'totalPrice'	=> Currency::currency($item->qty*$item->price),
		);
	}
}
