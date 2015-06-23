<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowDevice extends Model {

	protected $table = 'borrow_devices';

	protected $fillable = [
		'employee_id',
		'device_id',
		'borrow_date',
		'return_date',
	];

	public function device(){
		return $this->belongsTo('App\Device');
	}

}
