<?php
namespace App\Helpers;

use App\Brand;
use App\Category;
use App\ProductImage;
use Illuminate\Html\HtmlFacade as Html;
use Illuminate\Html\FormFacade as Form;
use Input;
use Route;
use App\Helpers\ImageManager;

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
			$folderPath = ImageManager::getContainerFolder('product', $image->image);
			$html .= '<li><img src="' . asset($folderPath . $image->image) . '" /></li>';
			$thumbnails[] = [
				'image' => asset(ImageManager::getThumb($image->image, 'product')),
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

	public static function productImagePath($imageName)
	{
		return 'uploads/products/' . $imageName[0] . '/' . $imageName[1] . '/' . $imageName[2] . '/';
	}

	public static function action_to_brand(Brand $brand)
	{
		$route = Route::getCurrentRoute();

		//category page
		if ($route->hasParameter('category_slug'))
		{
			$category = Category::findBySlug($route->parameter('category_slug'));

			$attributes = [$category->slug];
			$attributes = array_merge($attributes, Input::all());
			$attributes['b'] = $brand->slug;

			return action('ProductController@category', $attributes);
		}
		//brand page
		elseif ($route->hasParameter('brand_slug'))
		{
			$attributes = [$brand->slug];
			$attributes = array_merge($attributes, Input::all());

			return action('ProductController@brand', $attributes);
		}
		//other page
		else
		{
			$attributes = [$brand->slug];

			return action('ProductController@brand', $attributes);
		}

	}

	public static function action_to_category(Category $category)
	{
		$route = Route::getCurrentRoute();

		//category page
		if ($route->hasParameter('brand_slug'))
		{
			$brand = Brand::findBySlug($route->parameter('brand_slug'));

			$attributes = [$brand->slug];
			$attributes = array_merge($attributes, Input::all());
			$attributes['c'] = $category->slug;

			return action('ProductController@brand', $attributes);
		}
		//brand page
		elseif ($route->hasParameter('category_slug'))
		{
			$attributes = [$category->slug];
			$attributes = array_merge($attributes, Input::all());

			return action('ProductController@category', $attributes);
		}
		//other page
		else
		{
			$attributes = [$category->slug];

			return action('ProductController@category', $attributes);
		}
	}

	public static function remove_category()
	{
		$route = Route::getCurrentRoute();
		$input = Input::all();

		$brandSlug = $route->parameter('brand_slug') ? $route->parameter('brand_slug') : (Input::get('b') ? Input::get('b') : '');
		if ($brandSlug) $brand = Brand::findBySlug($brandSlug);

		//if this is brand page
		if ($route->hasParameter('brand_slug'))
		{
			$attributes = [$brand->slug];

			$otherParams = in_array('c', array_keys($input)) ? array_except($input, 'c') : $input;

			$attributes = array_merge($attributes, $otherParams);

			return action('ProductController@brand', $attributes);
		}
		//if this is category page
		elseif ($route->hasParameter('category_slug'))
		{
			if (isset($brand))
			{
				$attributes = [$brand->slug];

				$otherParams = in_array('b', array_keys($input)) ? array_except($input, 'b') : $input;

				$attributes = array_merge($attributes, $otherParams);

				return action('ProductController@brand', $attributes);
			} else
			{
				return action('HomeController@index');
			}

		} else {
			return action('HomeController@index');
		}
	}

	public static function remove_brand()
	{
		$route = Route::getCurrentRoute();
		$input = Input::all();

		$categorySlug = $route->parameter('category_slug') ? $route->parameter('category_slug') : (Input::get('c') ? Input::get('c') : '');
		if ($categorySlug) $category = Category::findBySlug($categorySlug);

		//if this is category page
		if ($route->hasParameter('category_slug'))
		{
			$attributes = [$category->slug];

			$otherParams = in_array('b', array_keys($input)) ? array_except($input, 'b') : $input;

			$attributes = array_merge($attributes, $otherParams);

			return action('ProductController@category', $attributes);
		}
		//if this is brand page
		elseif ($route->hasParameter('brand_slug'))
		{
			if (isset($category))
			{
				$attributes = [$category->slug];

				$otherParams = in_array('c', array_keys($input)) ? array_except($input, 'c') : $input;

				$attributes = array_merge($attributes, $otherParams);

				return action('ProductController@category', $attributes);
			} else
			{
				return action('HomeController@index');
			}

		} else {
			return action('HomeController@index');
		}
	}

	public static function showThumb($filename, $type)
	{
		return asset(ImageManager::getThumb($filename, $type));
	}

}

