<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	protected $table = 'devices';

	protected $fillable = [
		'id',
		'kind_device_id',
		'infomation_id',
		'serial_device',
		'os_id',
		'status_id',
		'created_at',
		'updated_at',
		'employee_id',
		
		'receive_date',
		'return_date',
	];
public function employee() {
		return $this->belongsTo('App\Employee');
	});
	

	}
	public function infomation_device() {
		return $this->belongsTo('App\InformationDevice');
	}
	public function operating_system() {
		return $this->belongsTo('App\OperatingSystem');
	}
	public function status_devices() {
		return $this->belongsTo('App\StatusDevice');
	}
	public function kind_device() {
		return $this->belongsTo('App\KindDevice');
	}
}
