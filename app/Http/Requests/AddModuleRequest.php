<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddModuleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			"name" => "required|min:2|max:255|unique:modules",
			"version" => "required|min:3|max:255",
			"order" => "required|numeric",
		];
	}

}
