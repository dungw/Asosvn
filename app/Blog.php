<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model {

	protected $table = 'blogs';

	protected $fillable = ['image', 'title', 'subtitle', 'content', 'slug'];

	protected $hidden = [];

	public static function findBySlug($slug)
	{
		return self::query()->where('slug', $slug)->first();
	}

}
