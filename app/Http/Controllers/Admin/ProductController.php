<?php namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Distributor;
use App\Http\Requests;
use App\Http\Requests\CreateProductRequest;
use App\Product;
use App\ProductImage;
use File;
use Input;
use Intervention\Image\Facades\Image;
use Route;
use Session;

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

	public function store(CreateProductRequest $request)
	{
		$product = Product::create($request->all());
		if (!empty($input['distributors']))
		{
			foreach ($input['distributors'] as $dis)
			{
				$product->distributors()->attach($dis);
			}
		}

		//upload images
		if (Input::exists('images'))
		{
			$uploadedImages = Input::file('images');
			if (!empty($uploadedImages))
			{
				foreach ($uploadedImages as $file)
				{
					//extension
					$ext = $file->getClientOriginalExtension();

					//random 16 characters
					$filename = str_random();

					//get and create container folder if needed
					$folderPath = ProductImage::getContainerFolder($product->id);

					//full path
					$path = public_path($folderPath . '/' . $filename . '.' . $ext);

					//save image to path
					Image::make($file->getRealPath())->save($path);

					//create and save thumbnails
					$pathThumb = public_path($folderPath . '/' . $filename . '_' . ProductImage::THUMBNAIL_SIZE . '.' . $ext);
					ProductImage::createThumb($pathThumb, $file);

					//insert to database
					ProductImage::create(['product_id' => $product->id, 'image' => ($filename . '.' . $ext)]);
				}
			}

		}

		Session::flash('success', 'Created a product successful!');

		return redirect('admin/product');
	}

	public function show($id)
	{
		$data['product'] = Product::findOrFail($id);


		return view('admin.pages.product.details', $data);
	}

	public function edit($id)
	{
		$data = ['product' => Product::find($id), 'categories' => Category::active()->lists('name', 'id'), 'brands' => Brand::lists('name', 'id'), 'availabilities' => [], 'distributors' => Distributor::lists('name', 'id'), 'conditions' => [null => 'Normal'],];

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

	public function update(CreateProductRequest $request)
	{
		$input = $request->all();

		$product = Product::findOrFail(Route::input('product'));

		$product->update($input);

		array_forget($input['distributors'], 0);
		if (!empty($input['distributors']))
		{
			$product->distributors()->sync($input['distributors']);
		}

		//upload images
		if (Input::exists('images'))
		{
			$uploadedImages = Input::file('images');

			if (!empty($uploadedImages))
			{
				foreach ($uploadedImages as $file)
				{
					//extension
					$ext = $file->getClientOriginalExtension();

					//random 16 characters
					$filename = str_random();

					//get and create container folder if needed
					$folderPath = ProductImage::getContainerFolder($product->id);

					//full path
					$path = public_path($folderPath . '/' . $filename . '.' . $ext);

					//save image to path
					Image::make($file->getRealPath())->save($path);

					//create and save thumbnails
					$pathThumb = public_path($folderPath . '/' . $filename . '_' . ProductImage::THUMBNAIL_SIZE . '.' . $ext);
					ProductImage::createThumb($pathThumb, $file);

					//insert to database
					ProductImage::create(['product_id' => $product->id, 'image' => ($filename . '.' . $ext)]);
				}
			}
		}

		Session::flash('success', 'Updated a product successful!');

		return redirect('admin/product');
	}

	public function destroy($id)
	{
		$product = Product::findOrFail($id);

		$product->delete();

		if (File::exists(public_path(ProductImage::getContainerFolder($id))))
		{
			File::deleteDirectory(public_path(ProductImage::getContainerFolder($id)));
		}

		Session::flash('success', 'Product is deleted successful!');

		return redirect('admin/product');
	}

	public function deleteImage($productId, $imageId)
	{
		$image = ProductImage::findOrFail(intval($imageId));

		//delete thumbnail first
		File::delete(public_path('uploads/products/' . $productId . '/' . ProductImage::getThumb($image->image)));

		//delete image
		File::delete(public_path('uploads/products/' . $productId . '/' . $image->image));

		//delete in database
		$result = $image->delete();
		if ($result)
		{
			$data = ['success' => true, 'error' => null,];
		} else
		{
			$data = ['success' => false, 'error' => 'Cannot delete this image!',];
		}

		print json_encode($data);
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
			while (Product::findBySlug($slug))
			{
				$slug .= '-' . $count;
				$count++;
			}
		}

		print $slug;
	}

}
