<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingSystem extends Model {

	protected $table = 'operating_systems';

	protected $fillable = [
		'id',
		'os_name',
		'version',
		'created_at',
		'updated_at',
	];

	public function device() {
		return $this->hasMany('App\Device');
	}
public static function validate($input, $id = null) {

		$rules = array(
			'os_name' => 'required',
			'version' => 'required',
		);

		return \Validator::make($input, $rules);
	}
}

