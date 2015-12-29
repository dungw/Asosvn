<?php namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    /**
     * list all product
     * @return string
     */
    public function index()
    {
        $data['products'] = Product::all();

        return view('pages.products', $data);
    }

	public function category($slug)
	{
		$category = Category::findBySlug($slug);
		if (!$category)
		{
			return redirect('404');
		}

		return view('pages.products');
	}

    /**
     * get product details
     * @param $id
     * @return array|string
     */
    public function show($id)
    {
        $product = Product::find($id);

        if ($product) {
            return json_encode($product);
        }

        return [];
    }

	/**
	 * get details product by slug
	 * @param $slug
	 * @return array|string
	 */
	public function details($slug)
	{
		$product = Product::findBySlug($slug);
		$product = Product::find($product->id);
		$brandName = $product->brand->name;
		$images = $product->images->toArray();

		if ($product) {
			$product->brand_name = $brandName;
			$product->images = $images;

			return json_encode($product);
		}

		return [];
	}

}
