<?php namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Helpers\ImageManager;
use App\Helpers\SerializedAttribute;
use App\Http\Requests;
use App\Product;
use App\ProductImage;

class ProductController extends BaseController
{

	//number item per page(product list)
	const PAGINATION_ITEM_PER_PAGE = 15;

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

		return view('pages.products', $data);
	}

	public function brand($slug)
	{
		//get brand
		$data['brand'] = Brand::findBySlug($slug);
		if (!$data['brand']) redirect('404');

		//get products
		$data['products'] = Product::filterWithBrand($data['brand']->id)->paginate(self::PAGINATION_ITEM_PER_PAGE);

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

		$data['product'] = $product;

		$data['mainImage'] = $product->mainImage()->image;

		//get recommended products
		$data['recommendedProducts'] = Product::filterWithCategory($product->category_id)->where('id', '!=', $product->id)->limit(6)->get();

		//extra attributes
		$data['extraAttributes'] = SerializedAttribute::parseWithName($product->extra_attributes);

		return view('pages.product-details', $data);
	}

}
