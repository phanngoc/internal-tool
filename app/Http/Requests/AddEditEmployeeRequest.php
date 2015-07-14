<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddEditEmployeeRequest extends Request {

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
			// "firstname" => "required|min:2",
			// "lastname" => "required|min:2",
			// "phone" => "required|numeric|min:10|max:11",
			// "dateofbirth" => "required",
			// "email" => "required",
			// "address" => "required",
			// "phone" => "required",
			// //"employee_code" => "required",
			// "company" => "required",
			// "position" => "required",
			// "projectname" => "required",
			// "role" => "required",
			// "skillset" => "required",
			// "numberpeople" => "required"
		];
	}

}
