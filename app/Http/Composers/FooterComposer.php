<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Category;

class FooterComposer
{

	public function compose(View $view)
	{
		$categories = Category::where('parent_id', 0)
					->orderBy('created_at', 'asc')
					->get();

		$view->with('categories', $categories);
	}
}