<?php namespace App\Http\Controllers;

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
        $list = Product::all();

        return json_encode($list);
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
}
