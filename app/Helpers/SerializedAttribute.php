<?php namespace App\Helpers;

use App\Attribute;

class SerializedAttribute
{

	public static function isJson($string)
	{
		return ((is_string($string) && (is_object(json_decode($string)) || is_array(json_decode($string))))) ? true : false;
	}

	public static function toJson($dataArray)
	{
		if (empty($dataArray) || !is_array($dataArray)) return null;

		return json_encode($dataArray);
	}

	public static function parseWithKey($jsonString, $toArray = false)
	{
		//check string has json format
		if (!self::isJson($jsonString)) return array();

		$attributes = $toArray ? json_decode($jsonString, true) : json_decode($jsonString);

		return $attributes;
	}

	public static function parseWithName($categoryId, $jsonString)
	{
		$data = [];

		$keyData = self::parseWithKey($jsonString, true);

		//get name from database by key
		$baseAttrs = Attribute::findByKeys($categoryId, array_keys($keyData));

		if (!empty($baseAttrs))
		{
			foreach ($baseAttrs as $index => $attr)
			{
				if (isset($keyData[$attr->key]))
				{
					$data[$index]['key'] = $attr->key;
					$data[$index]['name'] = $attr->name;
					$data[$index]['value'] = $keyData[$attr->key];
					$data[$index]['unit'] = $attr->unit;
				}
			}
		}

		return $data;
	}

}

