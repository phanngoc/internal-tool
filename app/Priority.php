<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'priority';

	protected $fillable = [
		'name',
	];

	/**
	 * [validate description]
	 * @param  [type] $input [description]
	 * @param  [type] $id    [description]
	 * @return [type]        [description]
	 */
	public static function validate($input, $id = null) {

		$rules = array(
			'name' => 'required|unique:priority,name',
		);

		return \Validator::make($input, $rules);
	}


}
