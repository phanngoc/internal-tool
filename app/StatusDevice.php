<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusDevice extends Model {

	protected $table = 'status_devices';

	protected $fillable = [
		'id',
		'status',
		'description',
		'serial_device',
		'created_at',
		'updated_at',
	];

	public function devices() {
		return $this->hasMany('App\Device', 'status_id', 'id');
	}

	public static function validate($input, $id = null) {
		$rules = array(
			'status' => 'required',
		);
		return \Validator::make($input, $rules);
	}
}
