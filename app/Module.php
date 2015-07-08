<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

	protected $table = 'modules';

	protected $fillable = [
		'name',
		'description',
		'version',
		'order',
	];

	public static function validate($input, $id = null) {
		$rules = array(
			"name" => "required|min:3|max:255|unique:modules,name," . $id,
			"version" => "required|min:3|max:255",
			"order" => "required|numeric",
		);
		return \Validator::make($input, $rules);
	}
	public function feature() {
		return $this->hasMany('App\Feature');
	}

}
