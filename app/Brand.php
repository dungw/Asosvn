<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

	protected $fillable = [
		'name',
		'logo',
		'website',
		'order',
		'total_products',
		'slug',
	];

	public function products()
	{
		return $this->hasMany('App\Product');
	}

	public static function findBySlug($slug)
	{
		return self::query()->where('slug', $slug)->first();
	}

}
