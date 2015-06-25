<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class KindDevice extends Model {

	protected $table = 'kind_devices';

	protected $fillable = [
		'id',
		'model_id',
		'device_name',
		'quantity',
		'created_at',
		'updated_at',
	];

	public function device() {
		return $this->hasMany('App\Device');
	}

	public function model_device() {
		return $this->belongsTo('App\ModelDevice');
	}

}
