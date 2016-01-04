<?php namespace App\Http\Composers;

use App\Brand;
use App\Category;
use Illuminate\Contracts\View\View;
use Input;
use Route;

class SidebarComposer
{

	public function compose(View $view)
	{
		$data['categories'] = Category::active()->orderBy('order', 'desc')->get();

		//check if url parameters have category
		if (Route::getCurrentRoute()->hasParameter('category_slug'))
		{
			$data['curCategory'] = Category::findBySlug(Route::getCurrentRoute()->getParameter('category_slug'));
		} elseif (Input::has('c'))
		{
			$data['curCategory'] = Category::findBySlug(Input::get('c'));
		}

		$data['brands'] = Brand::all();

		//check if url has brand parameter
		if (Route::getCurrentRoute()->hasParameter('brand_slug'))
		{
			$data['curBrand'] = Brand::findBySlug(Route::getCurrentRoute()->parameter('brand_slug'));
		} elseif (Input::has('b'))
		{
			$data['curBrand'] = Brand::findBySlug(Input::get('b'));
		}

		$view->with($data);

	}

}

