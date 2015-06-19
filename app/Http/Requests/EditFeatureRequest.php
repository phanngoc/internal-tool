<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditFeatureRequest extends Request {

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
			"feature_name" => "required|min:3|max:100",
			"action"=>'required|min:3|max:150',
		];
	}

}
