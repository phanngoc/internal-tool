<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class KindDevice extends Model {

	protected $table = 'kind_devices';

	protected $fillable = [
		'id',
		'model_id',
		'device_name',
		'quantity',
		'created_at',
		'updated_at',
	];

	public function device() {
		return $this->hasMany('App\Device');
	}

	public function model_device() {
		return $this->belongsTo('App\ModelDevice');
	}
	public static function validate($input, $id = null) {

		$rules = array(
			"device_name" => "required|min:3|max:255|unique:kind_devices,device_name," . $id,
			"quantity" => "required|min:3|max:255",
		);

		return \Validator::make($input, $rules);
	}
}
