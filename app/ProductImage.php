<?php namespace App;

use File;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;

class ProductImage extends Model
{
	protected $table = 'product_image';

	protected $fillable = ['product_id', 'image'];

	const NO_IMAGE = 'images/no-image.jpg';

	public function product()
	{
		return $this->belongsTo('App\Product');
	}

}
