<?php namespace App;

use File;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Intervention\Image\Facades\Image;

class ProductImage extends Model
{
	protected $table = 'product_image';

	protected $fillable = ['product_id', 'image'];

	const THUMBNAIL_SIZE = '200x200';

	public function product()
	{
		return $this->belongsTo('App\Product');
	}

	public static function getThumb($filename)
	{
		$thumb = '';
		if (strpos($filename, '.'))
		{
			$temp = explode('.', $filename);
			$thumb = $temp[0] . '_' . self::THUMBNAIL_SIZE . '.' . $temp[1];
		}

		return $thumb;
	}

	public static function createThumb($path, UploadedFile $file)
	{
		$sizeThumb = explode('x', ProductImage::THUMBNAIL_SIZE);

		return self::iResize($file, $sizeThumb[0], $sizeThumb[1])->save($path);
	}

	public static function iResize(UploadedFile $file, $newW, $newH)
	{
		list($width, $height) = getimagesize($file->getRealPath());

		//if old width is bigger than old height, and new width is smaller than new height
		if ( ($width > $height && $newW < $newH) || ($width < $height && $newW > $newH) )
		{
			$temp = $newH;
			$newH = $newW;
			$newW = $temp;
		}

		//resize first
		$widthRatio = $width / $newW;
		$heightRatio = $height / $newH;

		if ($widthRatio < $heightRatio)
		{
			$resized = Image::make($file->getRealPath())->resize($newW, null, function($constraint)
			{
				$constraint->aspectRatio();
			});
		} else
		{
			$resized = Image::make($file->getRealPath())->resize(null, $newH, function($constraint)
			{
				$constraint->aspectRatio();
			});
		}

		//crop after resizing
		return $resized->crop($newW, $newH);
	}

	public static function getContainerFolder($filename)
	{
		$folderPath = 'uploads/products/' . $filename[0] . '/' . $filename[1] . '/' . $filename[2];

		if (!is_dir(public_path($folderPath)))
		{
			File::makeDirectory(public_path($folderPath), 0775, true);
		}

		return $folderPath;
	}

}
