<?php namespace App\Http\Requests;

use Auth;

class CategoryRequest extends Request
{

	public function authorize()
	{
		return Auth::admin()->check() ? true : false;
	}

	public function rules()
	{
		switch ($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return ['name' => 'required|unique:categories'];
			}
			case 'PUT':
			case 'PATCH':
			{
				return ['name' => 'required'];
			}
			default: break;
		}
	}

}
