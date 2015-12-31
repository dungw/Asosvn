<?php namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Helpers\ImageManager;
use App\Http\Requests;
use App\Http\Requests\BrandRequest;
use Input;
use Session;

class BrandController extends AdminController
{

	public function index()
	{
		$data['brands'] = Brand::all();

		return view('admin.pages.brand.list', $data);
	}

	public function create()
	{
		$data = [];

		return view('admin.pages.brand.create', $data);
	}

	public function store(BrandRequest $request)
	{
		$brand = Brand::create($request->all());

		$this->uploadImage($brand, $request->file('logo'));

		Session::flash('success', 'Created a brand successful!');

		return redirect('admin/brand');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$data['brand'] = Brand::findOrFail($id);

		return view('admin.pages.brand.edit', $data);
	}

	public function update($id, BrandRequest $request)
	{
		$brand = Brand::findOrFail($id);

		$brand->update($request->all());

		$this->uploadImage($brand, $request->file('logo'));

		Session::flash('success', 'Updated brand successful!');

		return redirect('admin/brand');
	}

	public function destroy($id)
	{
		$brand = Brand::findOrFail($id);

		$brand->delete();

		return redirect('admin/brand');
	}

	public function generateSlug()
	{
		$slug = '';
		$name = trim(Input::get('name'));
		if ($name !== '')
		{
			$slug = str_slug($name);

			//check unique
			$count = 1;
			while (Brand::findBySlug($slug))
			{
				$slug .= '-' . $count;
				$count++;
			}
		}

		print $slug;
	}

	private function uploadImage(Brand $brand, $file)
	{
		if (!$file) return false;

		$filename = ImageManager::upload($file, 'brand');

		//insert to database
		$brand->logo = $filename;
		$brand->save();

		return $brand;
	}

}
