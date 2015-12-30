<?php namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Distributor;
use App\Helpers\MyHtml;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
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

	public function store(ProductRequest $request)
	{
		$product = Product::create($request->all());

		$this->syncDistributor($product, $request->get('distributors'));

		$this->uploadImages($product, $request->file('images'));

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
		$data = [
			'product' => Product::find($id),
			'categories' => Category::active()->lists('name', 'id'),
			'brands' => Brand::lists('name', 'id'),
			'availabilities' => [],
			'distributors' => Distributor::lists('name', 'id'),
			'conditions' => [null => 'Normal'],
		];

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

	public function update($id, ProductRequest $request)
	{
		$product = Product::findOrFail($id);

		$product->update($request->all());

		$this->syncDistributor($product, $request->get('distributors'));

		$this->uploadImages($product, $request->file('images'));

		Session::flash('success', 'Updated a product successful!');

		return redirect('admin/product');
	}

	public function destroy($id)
	{
		$product = Product::findOrFail($id);

		foreach ($product->images()->get() as $image)
		{
			$this->deleteRealImage($image);
		}

		$product->delete();

		Session::flash('success', 'Product is deleted successful!');

		return redirect('admin/product');
	}

	public function deleteImage($productId, $imageId)
	{
		$image = ProductImage::findOrFail(intval($imageId));

		$this->deleteRealImage($image);

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

	private function deleteRealImage(ProductImage $image)
	{
		File::delete( public_path( MyHtml::productImagePath( ProductImage::getThumb($image->image) ) . ProductImage::getThumb($image->image) ) );

		File::delete(public_path( MyHtml::productImagePath($image->image) . $image->image ) );
	}

	private function syncDistributor(Product $product, $distributors)
	{
		if (!empty($distributors))
		{
			$product->distributors()->sync($distributors);
		}

		return $product;
	}

	private function uploadImages(Product $product, $images)
	{
		if (!empty($images))
		{
			foreach ($images as $file)
			{
				if ($file == null) continue;

				//extension
				$ext = $file->getClientOriginalExtension();

				//random 16 characters
				$filename = md5(str_random());

				//get and create container folder if needed
				$folderPath = ProductImage::getContainerFolder($filename);

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

		return $product;
	}

}
