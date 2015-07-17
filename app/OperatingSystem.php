<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model {

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'operating_systems';

	protected $fillable = [
		'id',
		'os_name',
		'version',
		'created_at',
		'updated_at',
	];

	/**
	 * one to many relation
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function device() {
		return $this->hasMany('App\Device');
	}

	/**
	 * validate
	 * @param  [type] $input
	 * @param  [int] $id
	 * @return Validator
	 */
	public static function validate($input, $id = null) {

		$rules = array(
			"os_name" => "required|min:3|max:255|unique:operating_systems,os_name," . $id,
			"version" => "required|min:3|max:255",
		);

		return \Validator::make($input, $rules);
	}
}
