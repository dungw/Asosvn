<?php namespace App;

use Illuminate\Database\Eloquent\Model;

//normal order
define('ORDER_NORMAL', 1);
//custom order
define('ORDER_CUSTOM', 2);
//status
define('ORDER_PENDING', 'pending');
define('ORDER_DEPOSIT', 'deposit');
define('ORDER_PROCESSING', 'processing');
define('ORDER_SHIPPING', 'shipping');
define('ORDER_COMPLETE', 'complete');
define('ORDER_CANCEL', 'canceled');



class Order extends Model {

    protected $table = 'orders';

    protected $fillable = ['user_id', 'type', 'name', 'phone', 'email', 'address', 'note', 'deposit_value', 'shipping_cost', 'total_amount', 'status'];

    protected $hidden = [];

    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

	public function customs()
	{
		return $this->hasOne('App\OrderCustom');
	}

}
