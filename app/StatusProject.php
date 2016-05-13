<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProject extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	const CLOSED = 5;
	
	protected $table = 'statusprojects';
	protected $fillable = [
		'id',
		'name',
		'description',
		'color',
		'background'
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'name' => 'required',
		);

		return \Validator::make($input, $rules);
	}
}
