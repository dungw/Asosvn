<?php namespace App\Http\Controllers\Admin;

use App\Attribute;
use App\Category;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use Input;
use Route;
use Session;

class CategoryController extends AdminController
{

	public function index()
	{
		$data['parents'] = Category::parents()->orderBy('name')->get();

		return view('admin.pages.category.list', $data);
	}

	public function create()
	{
		$data = [
			'categories' => [0 => 'Root'],
		];

		$data['categories'] = array_add(Category::lists('name', 'id'), 0, 'Root');

		return view('admin.pages.category.create', $data);
	}

	public function store(CategoryRequest $request)
	{
		$category = Category::create($request->all());

		$this->syncAttributes($category->id, $request->get('attribute'));

		Session::flash('success', 'Created a category successful!');

		return redirect('admin/category');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$data['category'] = Category::findOrFail($id);

		$data['categories'] = array_add(Category::lists('name', 'id'), 0, 'Root');

		//remove itself
		$data['categories'] = array_except($data['categories'], $id);

		//remove its children
		$data['categories'] = array_except($data['categories'], $data['category']->children()->lists('id'));

		//get attributes of this record
		$data['attributes'] = $data['category']->attributes()->get();

		return view('admin.pages.category.edit', $data);
	}

	public function update($id, CategoryRequest $request)
	{
		$category = Category::findOrFail($id);

		$category->update($request->all());

		//insert attributes
		$this->syncAttributes($id, $request->get('attribute'));

		Session::flash('success', 'Updated category successful!');

		return redirect('admin/category');
	}

	public function destroy($id)
	{
		$product = Category::findOrFail($id);

		$product->delete();

		return redirect('admin/category');
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
			while (Category::findBySlug($slug))
			{
				$slug .= '-' . $count;
				$count++;
			}
		}

		print $slug;
	}

	public function getAttribute()
	{
		$id = Input::get('id');
		$category = Category::findOrFail($id);

		if ($category)
		{
			$attributes = $category->attributes()->get();

			return json_encode($attributes);
		}

		return null;
	}

	private function syncAttributes($id, $attrData)
	{
		//delete old attributes if exist
		Attribute::query()->where('category_id', $id)->delete();

		//add new attributes
		if (!empty($attrData))
		{
			//array keys
			$added = [];

			foreach ($attrData as $key => $row)
			{
				if (!in_array($row['key'], $added))
				{
					//add category id
					$attrData[$key]['category_id'] = $id;

					$added[] = $row['key'];
				} else
				{
					unset($attrData[$key]);
				}
			}

		}

		Attribute::query()->insert($attrData);
	}

}
