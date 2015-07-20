<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusDevice extends Model {
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'status_devices';

	protected $fillable = [
		'id',
		'status',
		'description',
		'serial_device',
		'created_at',
		'updated_at',
	];
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function devices() {
		return $this->hasMany('App\Device', 'status_id', 'id');
	}

	public static function validate($input, $id = null) {
		$rules = array(
			"status" => "required|min:3|max:255|unique:status_devices,status," . $id,
			
		);
		return \Validator::make($input, $rules);
	}
}
