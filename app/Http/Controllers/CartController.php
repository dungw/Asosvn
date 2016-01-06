<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Cart;
use Session;

class CartController extends Controller
{

	public function index()
	{
		$cart = Cart::content();
		$total = Cart::total();

		return view('pages.cart', compact('cart', 'total'));
	}

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

	public function remove($rowId)
	{
		Cart::remove($rowId);

		return array(
			'qty' 	=> count(Cart::content()),
			'rowId' => $rowId
		);
	}

	public function updateMenu()
	{
		return view('includes.default.shop-menu');
	}

	public function updateTotal()
	{
		return view('pages.cart-total-area')->with('total', Cart::total());
	}

}
