<?php namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Input;

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
			->first();
	}

	public function scopeFilterWithCategory($query, $categoryId)
	{
		$query->where('category_id', '=', $categoryId);

		$this->scopeOtherParams($query);

		return $query;
	}

	public function scopeFilterWithBrand($query, $brandId)
	{
		$query->where('brand_id', '=', $brandId);

		$this->scopeOtherParams($query);

		return $query;
	}

	private function scopeOtherParams(&$query)
	{
		$input = Input::all();

		// brand
		if (isset($input['b']))
		{
			$brand = Brand::findBySlug($input['b']);

			$query->where('brand_id', '=', $brand->id);
		}
		elseif (isset($input['c']))
		{
			$category = Category::findBySlug($input['c']);

			$query->where('category_id', '=', $category->id);
		}
		//other params
		else {

		}
	}

}
