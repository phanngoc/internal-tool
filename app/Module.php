<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'modules';

	protected $fillable = [
		'name',
		'description',
		'version',
		'order',
	];

	/**
	 * validate
	 * @return validator
	 */	
	public static function validate($input, $id = null) {
		$rules = array(
			"name" => "required|min:3|max:255|unique:modules,name," . $id,
			"version" => "required|min:3|max:255",
			"order" => "required|numeric",
		);
		return \Validator::make($input, $rules);
	}

	/**
	 * one to many relation
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function feature() {
		return $this->hasMany('App\Feature');
	}

}
