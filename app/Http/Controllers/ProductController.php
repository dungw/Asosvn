<?php namespace App\Http\Controllers;

use App\Http\Requests;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    public function index()
    {
        $list = array('name' => 'thep');
        return json_encode($list);
    }
}
