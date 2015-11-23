<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model {

	protected $fillable = [
		'name',
		'website',
		'logo'
	];

	public function promotions()
	{
		return $this->hasMany('App\Promotion');
	}

}
