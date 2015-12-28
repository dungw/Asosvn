<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $fillable = [
		'sku',
		'brand_id',
		'category_id',
		'name',
		'description',
		'price',
		'availability',
		'condition',
		'quantity',
		'slug',
	];

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function brand()
	{
		return $this->belongsTo('App\Brand');
	}

	public function distributors()
	{
		return $this->belongsToMany('App\Distributor')->withTimestamps();
	}

	public function promotions()
	{
		return $this->belongsToMany('App\Product')->withTimestamps();
	}

	public function images()
	{
		return $this->hasMany('App\ProductImage');
	}

	public function condition()
	{
		$list = self::conditions();
		foreach ($list as $key => $value)
		{
			if ($key === $this->condition) return $value;
		}

		return null;
	}

	public static function conditions()
	{
		return [
			null      => 'Normal',
			'new'     => 'New',
			'saleoff' => 'Sale off',
		];
	}

	public static function availabilities()
	{
		return [
			'available'    => 'Available',
			'out_of_stock' => 'Out of stock',
		];
	}

	public static function findBySlug($slug)
	{
		return DB::table('products')
			->where('slug', $slug)
			->get();
	}

}
