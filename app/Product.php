<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $fillable = [
		'sku',
		'brand_id',
		'category_id',
		'name',
		'description',
		'price',
		'availability',
		'condition',
		'quantity'
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
}
