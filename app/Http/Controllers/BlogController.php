<?php namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller {

	const NUMBER_SHOW_IN_INDEX = 9;

	public function index()
	{
		$data['blogs'] = DB::table('blogs')
			->take(self::NUMBER_SHOW_IN_INDEX)
			->orderBy('created_at', 'desc')
			->get();

		return view('cms.blog.index', $data);
	}

	public function detail($slug)
	{
		$data['blog'] = Blog::findBySlug($slug);

		if (!$data['blog']) {
			abort(404);
		}

		return view('cms.blog.details', $data);
	}

	public function showAll()
	{
		$data['blogs'] = Blog::all();

		return view('cms.blog.list', $data);
	}

}
