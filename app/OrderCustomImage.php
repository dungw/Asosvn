<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCustomImage extends Model {

	protected $table = 'order_custom_images';

	protected $fillable = ['order_custom_id', 'image'];

	protected $hidden = [];

	public function orderCustom()
	{
		return $this->belongsTo('App\OrderCustom');
	}

}
