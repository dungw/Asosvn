<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $fillable = [
		'parent_id',
		'name',
		'order'
	];

	public function products()
	{
		return $this->hasMany('App\Product');
	}

}
