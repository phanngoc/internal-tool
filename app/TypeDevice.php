<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDevice extends Model {

	protected $table = 'type_devices';
	protected $fillable = [
		'id',
		'type_name',
		'description',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'type_name' => 'required',
		);

		return \Validator::make($input, $rules);
	}
}
