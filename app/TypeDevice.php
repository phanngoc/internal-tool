<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDevice extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'type_devices';

	protected $fillable = [
		'type_name',
		'description',
	];

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function model_device() {
		return $this->hasMany('App\ModelDevice', 'type_id');
	}

	public function kind_devices() {
		return $this->hasMany('App\KindDevice', 'type_id', 'id');
	}

	/**
	 * @param  input array
	 * @param  id int
	 * @return validator
	 */
	public static function validate($input, $id = null) {
		$rules = array(		
			"type_name" => "required|min:3|max:255|unique:type_devices,type_name," . $id,
			
		);
		return \Validator::make($input, $rules);
	}
}
