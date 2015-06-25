<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model {

	protected $table = 'user_project';
	protected $fillable = [
		'user_id',
		'project_id',
		'group_id',
		'joined',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'user_id' => 'required|exists:users,id',
			'project_id' => 'required|exists:projects,id',
			'group_id' => 'required|exists:groups,id',
			'joined' => 'required',
		);

		return \Validator::make($input, $rules);
	}
}
