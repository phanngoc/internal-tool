<?php
namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddEmployeeRequest extends Request {

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
			"firstname" => "required|min:2",
			"lastname" => "required|min:2",
			"employee_code" => "required|min:7|unique:employees",
			"phone" => "required|min:10|max:11",
			"email" => "required|unique:employees",
		];
	}

}
