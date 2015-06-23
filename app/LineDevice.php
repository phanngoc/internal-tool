<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LineDevice extends Model {

	protected $table = 'line_devices';

	protected $fillable = [
		'type_id',
		'name_device',
	];

	public function type_device(){
		return $this->belongsTo('App\TypeDevice');
	}

	public function information_devices(){
		return $this->hasMany('App\InformationDevice', 'line_device_id', 'id');
	}

	public function devices(){
		return $this->hasMany('App\Device', 'line_device_id', 'id');
	}

}
