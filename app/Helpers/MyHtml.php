<?php
namespace App\Helpers;

use App\ProductImage;
use Illuminate\Html\HtmlFacade as Html;
use Illuminate\Html\FormFacade as Form;


class MyHtml extends Html
{

	public static function label($for, $title, $required=false)
	{
		$html = '<div class="col-sm-2 talign-r">';
		$html .= Form::label($for, $title, ['class' => 'control-label']);
		$html .= $required ? ' <span class="asterisk">*</span>' : '';
		$html .= '</div>';

		return $html;
	}

	public static function text($name, $value, $options)
	{
		$html = '<div class="col-sm-7">';
		$html .= Form::text($name, $value, $options);
		$html .= '</div>';

		return $html;
	}

	public static function input($type, $name, $value, $options = [])
	{
		$html = '<div class="col-sm-7">';
		$html .= Form::input($type, $name, $value, $options);
		$html .= '</div>';

		return $html;
	}

	public static function file($name, $options)
	{
		$html = '<div class="col-sm-7">';
		$html .= Form::file($name, $options);
		$html .= '</div>';

		return $html;
	}

	public static function select($name, $items, $value, $options)
	{
		$html = '<div class="col-sm-7">';
		$html .= Form::select($name, $items, $value, $options);
		$html .= '</div>';

		return $html;
	}

	public static function textarea($name, $value, $options)
	{
		$html = '<div class="col-sm-7">';
		$html .= Form::textarea($name, $value, $options);
		$html .= '</div>';

		return $html;
	}

	public static function submit($title, $options)
	{
		$html = '<div class="col-sm-2"></div>';
		$html .= '<div class="col-sm-7">';
		$html .= Form::submit($title, $options);
		$html .= '</div>';

		return $html;
	}

	public static function btnEdit($url)
	{
		return '<a href="' . url($url) . '" class="btn btn-xs btn-default font14"><i class="fa fa-pencil"></i> Edit</a>';
	}

	public static function btnRemove($url)
	{
		$html = Form::open(['url' => $url, 'method' => 'DELETE', 'class' => 'inline']);
		$html .= '<button type="submit" onclick="return confirm(\'Are you sure?\')" class="btn btn-xs btn-default font14">';
		$html .= '<i class="fa fa-times-circle"></i> Remove';
		$html .= '</button>';
		$html .= Form::close();

		return $html;
	}

	public static function productImageSlider($productId, $images)
	{
		$html = '<div id="amazingslider-wrapper-1">';
		$html .= '<div id="amazingslider-1">';
		$html .= '<ul class="amazingslider-slides" style="display:none;">';

		$thumbnails = [];
		$count = 1;

		foreach ($images as $image)
		{
			$html .= '<li><img src="' . asset('uploads/products/' . $productId . '/' . $image->image) . '" /></li>';
			$thumbnails[] = [
				'image' => asset('uploads/products/' . $productId . '/' . ProductImage::getThumb($image->image)),
				'title' => 'Product-' . $productId . '-' . $count,
			];
			$count++;
		}

		$html .= '</ul>';
		$html .= '<ul class="amazingslider-thumbnails" style="display:none;">';

		foreach ($thumbnails as $thumb)
		{
			$html .= '<li>';
			$html .= '<img src="' . $thumb['image'] . '" alt="' . $thumb['title'] . '" title="' . $thumb['title'] . '"/>';
			$html .= '<a href="btn btn-sm btn-default font14"><i class="fa fa-times-circle"></i> Remove</a>';
			$html .= '</li>';
		}

        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';

		return $html;
	}

	public static function show($title, $value, $class = '')
	{
		$html = '<div class="form-group border-b ' . $class . '">';
		$html .= '<div class="col-sm-2 talign-r"><label>' . $title . '</label></div>';
		$html .= '<div class="col-sm-7"><span>' . $value . '</span></div>';
		$html .= '</div>';

		return $html;
	}

	public static function showMultiple($title, $array, $class = '')
	{
		$html = '<div class="form-group border-b ' . $class . '">';
		$html .= '<div class="col-sm-2 talign-r"><label>' . $title . '</label></div>';
		$html .= '<div class="col-sm-7">';
		$value = [];
		foreach ($array as $item)
		{
			$value[] = '<span>' . $item . '</span>';
		}
		$html .= implode(', ', $value);
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

}

