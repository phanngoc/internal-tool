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
			"firstname" => "required|min:3|max:255",
			"lastname" => "required|min:3|max:255",
			"phone" => "required|numeric|min:5",
<<<<<<< HEAD
			//"career_objective" => "required|min:3",
			/*"dateofbirth" => "required",
		"address" => "required",
		"company" => "",
		"startdate" => "",
		"enddate" => "",
		"mainduties" => "",
		"position" => "",
		"skill" => "required",
		"month_experience" => "required",
		"numberpeople" => "",*/
=======
			// "career_objective" => "required|min:3",
			"dateofbirth" => "required",
			// "address" => "required",

			// "skill" => "required",
			// "month_experience" => "required",
			// "numberpeople" => "",
>>>>>>> f2a7b76bdaca1b83ca20bba7c0c582c5679ab725
		];
	}

}
