<?php namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Distributor;
use App\Http\Requests;
use App\Product;
use Illuminate\Http\Request;
use Input;
use Route;

class ProductController extends AdminController
{

	public function index()
	{
		$data['products'] = Product::all();

		return view('admin.pages.product.list', $data);
	}

	public function create()
	{
		$data = [
			'categories'     => Category::active()->lists('name', 'id'),
			'brands'         => Brand::lists('name', 'id'),
			'availabilities' => [],
			'distributors'   => Distributor::lists('name', 'id'),
			'conditions'     => [null => 'Normal']
		];

		foreach (Product::availabilities() as $key => $value)
		{
			$data['availabilities'] = array_add($data['availabilities'], $key, $value);
		}

		foreach (Product::conditions() as $key => $value)
		{
			$data['conditions'] = array_add($data['conditions'], $key, $value);
		}

		return view('admin.pages.product.create', $data);
	}

	public function store(Request $request)
	{
		$input = $request->all();

		$product = Product::create($input);
		if (!empty($input['distributors']))
		{
			foreach ($input['distributors'] as $dis)
			{
				$product->distributors()->attach($dis);
			}
		}

		return redirect('admin/product');
	}

	public function show($id)
	{

	}

	public function edit($id)
	{
		$data = [
			'product'        => Product::find($id),
			'categories'     => Category::active()->lists('name', 'id'),
			'brands'         => Brand::lists('name', 'id'),
			'availabilities' => [],
			'distributors'   => Distributor::lists('name', 'id'),
			'conditions'     => [null => 'Normal'],
		];
		array_unshift($data['distributors'], 'None');

		foreach (Product::availabilities() as $key => $value)
		{
			$data['availabilities'] = array_add($data['availabilities'], $key, $value);
		}

		foreach (Product::conditions() as $key => $value)
		{
			$data['conditions'] = array_add($data['conditions'], $key, $value);
		}

		return view('admin.pages.product.edit', $data);
	}

	public function update($id)
	{
		$input = Input::all();

		$product = Product::findOrNew($id);

		$product->update($input);

		array_forget($input['distributors'], 0);
		$product->distributors()->sync($input['distributors']);

		return redirect('admin/product');
	}

	public function destroy($id)
	{
		$product = Product::findOrFail($id);

		$product->delete();

		return redirect('admin/product');
	}

}
