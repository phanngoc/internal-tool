<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceiveDevice extends Model {

	protected $table = 'receive_devices';

	protected $fillable = [
		'id',
		'employee_id',
		'device_id',
		'receive_date',
		'return_date',
		'created_at',
		'updated_at',
	];

}
