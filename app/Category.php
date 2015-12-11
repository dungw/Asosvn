<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	protected $fillable = [
		'parent_id',
		'name',
		'order',
	];

	public function products()
	{
		return $this->hasMany('App\Product');
	}

	public function scopeActive($query)
	{
		return $query->whereActive(self::STATUS_ACTIVE);
	}

	public function parent()
	{
		return $this->belongsTo('App\Category');
	}

	public function children()
	{
		return $this->hasMany('App\Category', 'parent_id');
	}
	
}
