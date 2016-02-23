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

	public static function findByKeys($id, $keys)
	{
		$query = self::query()->where('category_id', $id);
		if (is_array($keys))
		{

			return $query->whereIn('key', $keys)->get();

		} elseif (is_string($keys))
		{

			return $query->where('key', $keys)->first();
		}
	}

}
