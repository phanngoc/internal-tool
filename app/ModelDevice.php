<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelDevice extends Model {

	protected $table = 'model_devices';

	protected $fillable = [
		'id',
		'type_id',
		'model_name',
		'description',
		'created_at',
		'updated_at',
	];

	public function employee(){
		return $this->belongsTo('App\Employee');

	}
	public function kind_device() {
		return $this->hasMany('App\KindDevice');
	}

public function type_devices() {
		return $this->belongsTo('App\TypeDevice');
	}

}
