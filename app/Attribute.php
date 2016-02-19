<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{

	protected $table = 'attributes';

	protected $fillable = [
		'category_id',
		'key',
		'name',
		'unit'
	];

	public $timestamps = false;

	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public static function findByKeys($keys)
	{
		if (is_array($keys))
		{

			return self::query()->whereIn('key', $keys)->get();

		} elseif (is_string($keys))
		{

			return self::query()->where('key', $keys)->first();
		}
	}

}
