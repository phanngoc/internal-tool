<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	protected $table = 'devices';

	protected $fillable = [
		'line_device_id',
		'serial_device',
		'status',
	];

	public function line_device(){
		return $this->belongsTo('App\LineDevice');
	}

	public function borrow_devices(){
		return $this->hasMany('App\BorrowDevice', 'device_id', 'id');
	}

}
