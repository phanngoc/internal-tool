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
			'user_id' => 'required',
			'project_id' => 'required',
			'group_id' => 'required',
			'joined' => 'required',
		);

		return \Validator::make($input, $rules);
	}
}
