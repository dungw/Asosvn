<?php namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;

class BlogController extends Controller {

	public function index()
	{
		$data['blogs'] = DB::table('blogs')
			->take(Config::get('app.number_blog_show_in_index'))
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

		$data['older_blogs'] = Blog::where('created_at', '<', $data['blog']['created_at'])
			->take(Config::get('app.number_blog_older_in_detail'))
			->orderBy('created_at', 'desc')
			->get();
		;

		return view('cms.blog.details', $data);
	}

	public function showAll()
	{
		$data['blogs'] = DB::table('blogs')
			->orderBy('created_at', 'desc')
			->get();;

		return view('cms.blog.list', $data);
	}

}
