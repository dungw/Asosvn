<?php namespace App\Helpers;

use File;
use Intervention\Image\Facades\Image;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageManager
{
	const PRODUCT_IMAGE_PATH = 'uploads/products/';
	const PRODUCT_SMALL_SIZE = '85x85';
	const PRODUCT_MEDIUM_SIZE = '340x450';
	const BRAND_IMAGE_PATH = 'uploads/brands/';
	const BRAND_THUMB_SIZE = '80x50';
	const ORDER_IMAGE_PATH = 'uploads/orders/';



	public static function upload($file, $type, $thumbnail = true)
	{
		//extension
		$ext = $file->getClientOriginalExtension();

		//random 16 characters
		$filename = md5(str_random());

		$folderPath = self::getContainerFolder($type, $filename);

		//get and create container folder if needed
		if (!is_dir(public_path($folderPath)))
		{
			File::makeDirectory(public_path($folderPath), 0775, true);
		}

		//full path
		$path = public_path($folderPath . '/' . $filename . '.' . $ext);

		//save image to path
		Image::make($file->getRealPath())->save($path);

		//create and save thumbnails
		if ($thumbnail)
		{
			$thumbSize = [];
			if ($type === 'product')
			{
				$thumbSize[] = self::PRODUCT_SMALL_SIZE;
				$thumbSize[] = self::PRODUCT_MEDIUM_SIZE;

			} elseif ($type === 'brand')
			{
				$thumbSize[] = self::BRAND_THUMB_SIZE;
			}

			if (!empty($thumbSize))
			{
				foreach ($thumbSize as $thumb)
				{
					$pathThumb = public_path($folderPath . '/' . $filename . '_' . $thumb . '.' . $ext);
					self::createThumb($pathThumb, $file, $thumb);
				}
			}
		}

		return $filename . '.' . $ext;
	}

	public static function getThumb($filename, $type, $size = 'small')
	{
		$thumb = '';

		$folder = self::getContainerFolder($type, $filename);

		if ($type === 'product')
		{
			if ($size === 'small') $thumbSize = self::PRODUCT_SMALL_SIZE;
			if ($size === 'medium') $thumbSize = self::PRODUCT_MEDIUM_SIZE;

		} elseif ($type === 'brand')
		{
			$thumbSize = self::BRAND_THUMB_SIZE;
		}

		if (strpos($filename, '.'))
		{
			$temp = explode('.', $filename);
			$thumb = $temp[0] . '_' . $thumbSize . '.' . $temp[1];
		}

		return $folder . $thumb;
	}

	public static function getContainerFolder($type, $filename = '')
	{
		if ($type === 'product' && !$filename) {
			return null;
		}

		if ($type === 'product') {
			return self::PRODUCT_IMAGE_PATH . $filename[0] . '/' . $filename[1] . '/' . $filename[2] . '/';
		} elseif ($type === 'brand') {
			return self::BRAND_IMAGE_PATH;
		} elseif ($type === 'order') {
			return self::ORDER_IMAGE_PATH . $filename[0] . '/' . $filename[1] . '/' . $filename[2] . '/';
		}

		return null;
	}

	private static function createThumb($path, UploadedFile $file, $thumbSize = self::PRODUCT_SMALL_SIZE)
	{
		$sizeThumb = explode('x', $thumbSize);

		return self::iResize($file, $sizeThumb[0], $sizeThumb[1])->save($path);
	}

	private static function iResize(UploadedFile $file, $newW, $newH)
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

		if ($widthRatio > $heightRatio)
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
		//return $resized->crop($newW, $newH);

		return $resized;
	}

}
