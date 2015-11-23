<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model {

	protected $fillable = [
		'distributor_id',
		'name',
		'start_at',
		'end_at',
		'created_at',
		'updated_at'
	];

	protected $dates = ['start_at', 'end_at'];

	public function distributor()
	{
		return $this->belongsTo('App\Distributor');
	}

}
