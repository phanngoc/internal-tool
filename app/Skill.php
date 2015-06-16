<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {

	protected $table = 'skills';
	protected $fillable = [
		'id',
		'category_id',
		'skill',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'category_id' => 'required',
			'skill' => 'required',
		);

		return \Validator::make($input, $rules);
	}

}
