<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model {

	protected $table = 'devices';

	protected $fillable = [
		'kind_device_id',
		'information_id',
		'serial_device',
		'os_id',
		'status_id',
		'employee_id',
		'receive_date',
		'return_date',
	];
	public static function validate($input, $id = null) {
		$rules = [
			'kind_device_id' => 'required|exists:KindDevice,id',
			'information_id' => 'required|exists:InformationDevice,id',
			'serial_device' => 'required',
			'os_id' => 'required|exists:OperatingSystem,id',
			'status_id' => 'required|exists:StatusDevice,id',
		];
		return \Validator::make($input, $rules);
	}
	public function employee() {
		return $this->belongsTo('App\Employee');
	}

	public function infomation_device() {
		return $this->belongsTo('App\InformationDevice', 'information_id');
	}

	public function operating_system() {
		return $this->belongsTo('App\OperatingSystem', 'os_id');
	}
	public function status_devices() {
		return $this->belongsTo('App\StatusDevice', 'status_id', 'id');
	}
	public function kind_device() {
		return $this->belongsTo('App\KindDevice');
	}
}
