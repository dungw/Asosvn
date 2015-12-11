<?php namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests;
use App\Http\Requests\CreateCategoryRequest;
use Route;
use Session;

class CategoryController extends AdminController {


	public function index()
	{
		$data['categories'] = Category::all();

		return view('admin.pages.category.list', $data);
	}

	public function create()
	{
		$data = [
			'categories' => [0 => 'Root'],
		];

		$data['categories'] = array_merge($data['categories'], Category::lists('name', 'id'));

		return view('admin.pages.category.create', $data);
	}

	public function store(CreateCategoryRequest $request)
	{
		Category::create($request->all());

		Session::flash('success', 'Created a category successful!');

		return redirect('admin/category');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$data['category'] = Category::findOrFail($id);

		$data['categories'] = Category::lists('name', 'id');

		return view('admin.pages.category.edit', $data);
	}

	public function update(CreateCategoryRequest $request)
	{
		$category = Category::findOrFail(Route::input('category'));

		$category->update($request->all());

		Session::flash('success', 'Updated category successful!');

		return redirect('admin/category');
	}

	public function destroy($id)
	{
		$product = Category::findOrFail($id);

		$product->delete();

		return redirect('admin/category');
	}

}
