<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	protected $fillable = [
		'parent_id',
		'name',
		'order',
		'slug',
	];

	public function products()
	{
		return $this->hasMany('App\Product');
	}

	public function scopeActive($query)
	{
		return $query->whereActive(self::STATUS_ACTIVE);
	}

	public function scopeParents($query)
	{
		return $query->whereParentId(0);
	}

	public function parent()
	{
		return $this->belongsTo('App\Category', 'parent_id');
	}

	public function children()
	{
		return $this->hasMany('App\Category', 'parent_id');
	}

	public static function findBySlug($slug)
	{
		return DB::table('categories')
			->where('slug', $slug)
			->first();
	}

}
