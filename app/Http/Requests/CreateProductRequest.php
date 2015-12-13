<?php namespace App\Http\Requests;

class CreateProductRequest extends Request
{

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		switch($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'name'        => 'required',
					'sku'         => 'required|unique:products|min:5',
					'price'       => 'required',
					'category_id' => 'required',
					'brand_id'    => 'required',
					'image'       => 'mimes:png',
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'name'        => 'required',
					'sku'         => 'required|min:5',
					'price'       => 'required',
					'category_id' => 'required',
					'brand_id'    => 'required',
					'image'       => 'mimes:png',
				];
			}
			default:break;
		}

	}

}
