<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDevice extends Model {

	protected $table = 'type_devices';

	protected $fillable = [
		'type_name',
		'description',
		'created_at',
		'updated_at',
	];

	public function model_device() {
		return $this->hasMany('App\ModelDevice', 'type_id');
	}
	public function line_devices() {
		//return $this->hasMany()
	}
	public static function validate($input, $id = null) {

		$rules = array(
			'type_name' => 'required',
		);

		return \Validator::make($input, $rules);
	}
}
