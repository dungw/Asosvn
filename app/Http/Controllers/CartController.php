<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Session;
use Cart;

class CartController extends Controller
{

	public function getIndex()
	{
		return view('pages.cart');
	}

	public function add(Request $request)
	{
		$id = "'" . $request->get('id') . "'";
		$name = "'" . $request->get('name') . "'";
		$qty = $request->get('qty');
		$price = $request->get('price');
		$options = $request->get('options') ? $request->get('options') : array();

		if ($id) {
			$result = Cart::add($id, $name, $qty, $price, $options); dd($result);
			if ($result) {
				Session::flash('success', 'Product was add to cart successfully!');
			} else {
				Session::flash('error', 'Cannot add product to cart!');
			}
		} else {
			Session::flash('error', 'Cannot add product to cart!');
		}
	}

}
