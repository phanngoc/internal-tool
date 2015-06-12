<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

	protected $table = 'skills';
	protected $fillable = [
		'id',
		'skill',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'skill' => 'required',
		);

		return \Validator::make($input, $rules);
	}
	public function employee() {
		return $this->belongsToMany('\App\Employee', 'employee_skills');
	}

}
