<?php namespace App\Http\Controllers\Admin;

use App\Brand;
use App\Category;
use App\Distributor;
use App\Helpers\ImageManager;
use App\Helpers\MyHtml;
use App\Helpers\SerializedAttribute;
use App\Http\Requests;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\ProductImage;
use File;
use Input;
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
			'categories'     => [null => '- Choose category -'],
			'brands'         => Brand::lists('name', 'id'),
			'availabilities' => [],
			'distributors'   => Distributor::lists('name', 'id'),
			'conditions'     => [null => 'Normal']
		];

		$data['categories'] = array_merge($data['categories'], Category::active()->lists('name', 'id'));

		foreach (Product::availabilities() as $key => $value)
		{
			$data['availabilities'] = array_add($data['availabilities'], $key, $value);
		}

		foreach (Product::conditions() as $key => $value)
		{
			$data['conditions'] = array_add($data['conditions'], $key, $value);
		}

		//get all attributes of category
		$data['attributes'] = [];

		return view('admin.pages.product.create', $data);
	}

	public function store(ProductRequest $request)
	{
		$data = $request->all();

		//update extra attributes
		$data['extra_attributes'] = SerializedAttribute::toJson($data['attribute']);

		$product = Product::create($data);

		$this->syncDistributor($product, $request->get('distributors'));

		if ($request->hasFile('images')) $this->uploadImages($product, $request->file('images'));

		Session::flash('success', 'Created a product successful!');

		return redirect('admin/product');
	}

	public function show($id)
	{
		$data['product'] = Product::findOrFail($id);

		$data['attributes'] = SerializedAttribute::parseWithName($data['product']->category_id, $data['product']->extra_attributes);

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

		$data['attributes'] = SerializedAttribute::parseWithName($data['product']->category_id, $data['product']->extra_attributes);

		return view('admin.pages.product.edit', $data);
	}

	public function update($id, ProductRequest $request)
	{
		$product = Product::findOrFail($id);

		//update extra attributes
		$product->extra_attributes = SerializedAttribute::toJson($request->get('attribute'));

		$product->update($request->all());

		$this->syncDistributor($product, $request->get('distributors'));

		if ($request->hasFile('images')) $this->uploadImages($product, $request->file('images'));

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
		File::delete( public_path( MyHtml::productImagePath( ImageManager::getThumb($image->image, 'product') ) . ImageManager::getThumb($image->image, 'product') ) );

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
				$filename = ImageManager::upload($file, 'product');

				//insert to database
				ProductImage::create(['product_id' => $product->id, 'image' => ($filename)]);
			}
		}

		return $product;
	}

}
