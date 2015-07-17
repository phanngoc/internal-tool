<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Device extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
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

	/**
	 * Validate device's information
	 * 
	 * @param  [type] $input
	 * @param  [int] $id
	 * @return Validator
	 */
	public static function validate($input, $id = null) {
		$rules = [
			'kind_device_id' => 'required|exists:kind_devices,id',
			'information_id' => 'required|exists:information_devices,id',
			'serial_device'  => 'required',
			'os_id'          => 'required|exists:operating_systems,id',
			'status_id'      => 'required|exists:status_devices,id',
		];
		return \Validator::make($input, $rules);
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee() {
		return $this->belongsTo('App\Employee');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function infomation_device() {
		return $this->belongsTo('App\InformationDevice', 'information_id');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function operating_system() {
		return $this->belongsTo('App\OperatingSystem', 'os_id');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function status_devices() {
		return $this->belongsTo('App\StatusDevice', 'status_id', 'id');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function kind_device() {
		return $this->belongsTo('App\KindDevice');
	}
}
