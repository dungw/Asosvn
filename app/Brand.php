<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model {

	protected $fillable = [
		'name',
		'logo',
		'website',
		'order',
		'total_products'
	];

	public function products()
	{
		return $this->hasMany('App\Product');
	}

}
