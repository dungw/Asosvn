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
		$id = $request->get('id');
		if ($id) {
			$name = $request->get('name');
			$qty = $request->get('qty');
			$price = $request->get('price');
			$options = $request->get('options') ? $request->get('options') : array();
			$data = array(
				'id' 		=> (string)$id,
				'name'		=> (string)$name,
				'qty'		=> (int)$qty,
				'price' 	=> (float)$price,
				'options' 	=> $options,
			);

			$result = Cart::add($data);
			if ($result) {
				return 'success';
			} else {
				return 'error';
			}
		} else {
			return 'error';
		}
	}

}
