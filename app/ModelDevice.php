<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelDevice extends Model {

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'model_devices';

	protected $fillable = [
		'id',
		'type_id',
		'model_name',
		'description',
		'created_at',
		'updated_at',
	];

	/**
	 * one to many relation
	 * @return Illuminate\Database\Eloquent\Relations\belongsTo
	 */
	public function employee() {
		return $this->belongsTo('App\Employee');

	}

	/**
	 * one to many relation
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */	
	public function kind_device() {
		return $this->hasMany('App\KindDevice');
	}

	/**
	 * one to many relation
	 * @return Illuminate\Database\Eloquent\Relations\belongsTo
	 */	
	public function type_devices() {
		return $this->belongsTo('App\TypeDevice', 'type_id');
	}
	
	/**
	 * validate
	 * @return validator
	 */	
	public static function validate($input, $id = null) {

		$rules = array(
			"model_name" => "required|min:3|max:255|unique:model_devices,model_name," . $id,

		);

		return \Validator::make($input, $rules);
	}
}
