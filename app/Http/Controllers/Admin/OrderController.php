<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;

use App\Order;
use Illuminate\Http\Request;
use URL;

class OrderController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orders = Order::all();

		return view('admin.pages.order.list')->with('orders', $orders);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$order = Order::find($id);
		$items = $order->items()->get();

		return view('admin.pages.order.details', compact('order', 'items'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * @param Request $request
	 * @param $id
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update(Request $request, $id)
	{
		Order::findOrFail($id)->update($request->all());

		return redirect(URL::previous());
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Filter orders by status
	 * @param string $status
	 * @return \Illuminate\View\View
	 */
	public function filter($status = 'all')
	{
		if ($status == 'all') {
			$data['orders'] = Order::all();
		} else {
			$data['orders'] = Order::where('status', $status)->get();
		}

		$data['status'] = $status;

		return view('admin.pages.order.list', $data);
	}

}
