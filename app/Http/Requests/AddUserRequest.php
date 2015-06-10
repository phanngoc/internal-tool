<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddUserRequest extends Request {

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
			"fullname" => "required|min:4|max:50|regex:A-Za-z",
			"username" => "required|min:3|max:50|unique:users|regex:A-Za-z0-100",
			"password" => "required|min:6|max:80",
			'password_confirm' => 'required|same:password',
			"email" => "required|email|unique:users",
		];
	}

}
