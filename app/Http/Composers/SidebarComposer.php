<?php namespace App\Http\Composers;

use App\Brand;
use App\Category;
use Illuminate\Contracts\View\View;
use Route;

class SidebarComposer
{

	public function compose(View $view)
	{
		$data['categories'] = Category::active()->orderBy('order', 'desc')->get();

		if (Route::getCurrentRoute()->hasParameter('category_slug'))
		{
			$data['curCategory'] = Category::findBySlug(Route::getCurrentRoute()->getParameter('category_slug'))->id;
		}

		$data['brands'] = Brand::all();

		$view->with($data);
	}

}

