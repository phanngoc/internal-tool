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

	public function device() {
		return $this->hasMany('App\Device');
	}


}
