<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected $table = 'orders';

    protected $fillable = ['user_id', 'name', 'phone', 'email', 'address', 'note', 'deposit_value', 'shipping_cost', 'total_amount'];

    protected $hidden = [];

    public function orderItems()
    {
        return $this->hasMany('App\OrderItem');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
