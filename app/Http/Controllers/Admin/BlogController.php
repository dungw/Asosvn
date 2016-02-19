<?php namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Input;
use App\Helpers\ImageManager;
use Session;

class BlogController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data['blogs'] = \DB::table('blogs')->orderBy('created_at', 'desc')->get();

		return view('admin.pages.cms.blog.list', $data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.pages.cms.blog.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function store(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
			'slug' => 'required',
			'content' => 'required',
		]);

		$blog = Blog::create($request->all());

		if ($request->hasFile('image')) {
			$image = $request->file('image');
			//upload images
			$fileName = ImageManager::upload($image, 'blog');

			//insert to database
			$blog->update(['image' => $fileName]);
		}

		Session::flash('success', 'Created a blog successful!');

		return redirect('admin/blog');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$data['blog'] = Blog::find($id);

		return view('admin.pages.cms.blog.edit', $data);
	}

	/**
	 * Update blog
	 * @param $id
	 * @param Request $request
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function update($id, Request $request)
	{
		$blog = Blog::findOrFail($id);

		$blog->update($request->all());

		if ($request->hasFile('image')) {
			$image = $request->file('image');
			//upload images
			$fileName = ImageManager::upload($image, 'blog');

			//insert to database
			$blog->update(['image' => $fileName]);
		}

		Session::flash('success', 'Update a blog successful!');

		return redirect('admin/blog');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function generateSlug()
	{
		$slug = '';
		$title = trim(Input::get('title'));
		if ($title !== '')
		{
			$slug = str_slug($title);

			//check unique
			$count = 1;
			while (Blog::findBySlug($slug))
			{
				$slug .= '-' . $count;
				$count++;
			}
		}

		print $slug;
	}

}
