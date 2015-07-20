<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model {
	
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'skills';
	protected $fillable = [
		'id',
		'category_id',
		'skill',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'category_id' => 'required|exists:category_skills,id',
			'skill' => 'required',
		);

		return \Validator::make($input, $rules);
	}

}
