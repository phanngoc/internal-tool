<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class KindDevice extends Model {

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'kind_devices';

	protected $fillable = [
		'id',
		'model_id',
		'device_name',
		'quantity',
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
	 * one to many relation
	 * @return Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function model_device() {
		return $this->belongsTo('App\ModelDevice','model_id');
	}

	/**
	 * validate
	 * @param  $input
	 * @param  [int] $id
	 * @return validator
	 */
	public static function validate($input, $id = null) {

		$rules = array(
			"device_name" => "required|max:255|unique:kind_devices,device_name," . $id,
			"quantity" => "required|max:255",
		);

		return \Validator::make($input, $rules);
	}
}
