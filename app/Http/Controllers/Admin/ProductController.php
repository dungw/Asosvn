<?php namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;
use Route;

class ProductController extends AdminController
{

	public function index()
	{
		$data['products'] = Product::all();
		$data['products'] = array(
			array(
				'id' => 1,
				'name' => 'Leather Blue Jacket',
				'category' => 'Jacket & Coat',
				'price' => '$15.4',
				'thumbnail' => '1.jpg',
			),
		);

		return view('admin.pages.product.list', $data);
	}

	public function create()
	{
		$data['categories'] = [];
		$categories = Category::active()->get();
		if (!empty($categories))
		{
			foreach ($categories as $c)
			{
				$data['categories'][$c['id']] = $c['name'];
			}
		}

		$data['brands'] = Brand::all();

		$data['availabilities'] = [];

		$data['conditions'] = [];

		return view('admin.pages.product.create', $data);
	}

	public function store(Request $request)
	{
		$input = $request->all();

		Product::create($input);

		return redirect('admin/product');
	}

	public function show($id)
	{
		var_dump(Route::current()->getUri());
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}

}
