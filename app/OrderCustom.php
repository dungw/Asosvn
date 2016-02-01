<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCustom extends Model {

	protected $table = 'order_customs';

	protected $fillable = ['order_id', 'url', 'quantity', 'price'];

	protected $hidden = [];

	public function order()
	{
		return $this->belongsTo('App\Order');
	}

	public function images()
	{
		return $this->hasMany('App\OrderCustomImage');
	}

}
