<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProject extends Model {

	protected $table = 'statusprojects';
	protected $fillable = [
		'id',
		'name',
		'description',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'name' => 'required',
		);

		return \Validator::make($input, $rules);
	}
}
