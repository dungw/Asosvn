<?php namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Requests;
use App\Product;
use App\ProductImage;

class ProductController extends BaseController
{

	//number item per page(product list)
	const PAGINATION_ITEM_PER_PAGE = 1;

    public function index()
    {
        $data['products'] = Product::all();

        return view('pages.products', $data);
    }

	public function category($slug)
	{
		//get category
		$data['category'] = Category::findBySlug($slug);
		if (!$data['category']) return redirect('404');

		//get products
		$data['products'] = Product::filterWithCategory($data['category']->id)->paginate(self::PAGINATION_ITEM_PER_PAGE);

		//product images
		$data['images'] = $this->listsImage($data['products']);

		return view('pages.products', $data);
	}

	public function brand($slug)
	{
		//get brand
		$data['brand'] = Brand::findBySlug($slug);
		if (!$data['brand']) redirect('404');

		//get products
		$data['products'] = Product::filterWithBrand($data['brand']->id)->paginate(self::PAGINATION_ITEM_PER_PAGE);

		//product images
		$data['images'] = $this->listsImage($data['products']);

		return view('pages.products', $data);
	}

    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return json_encode($product);
        }

        return [];
    }

	public function details($slug)
	{
		$product = Product::findBySlug($slug);

		if (!$product) {
			abort(404);
		}

		$product = Product::find($product->id);
		$brandName = $product->brand->name;
		$images = $product->images->toArray();

		$product->brand_name = $brandName;
		$product->images = $images;

		return view('pages.product-details', compact('product', $product));
	}

	/**
	 * Function lists image from product list
	 *
	 * @param $products
	 * @return array $images
	 */
	private function listsImage($products)
	{
		$images = [];
		if (!empty($products))
		{
			foreach ($products as $product)
			{
				$mainImage = $product->images()->first()->image;
				$imagePath = 'uploads/products/' . $mainImage[0] . '/' . $mainImage[1] . '/' . $mainImage[2] . '/' . $mainImage;

				if (file_exists(public_path($imagePath)))
				{
					$images[$product->id] = $imagePath;
				} else
				{
					$images[$product->id] = ProductImage::NO_IMAGE;
				}
			}
		}

		return $images;
	}

}
