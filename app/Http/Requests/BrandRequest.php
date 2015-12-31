<?php namespace App\Http\Requests;

use Auth;

class BrandRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::admin()->check() ? true : false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
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
				return ['name' => 'required', 'slug' => 'required|unique:brands'];
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
