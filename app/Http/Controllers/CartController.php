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
		return view('pages.cart')->with('cart', Cart::content());
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

}
