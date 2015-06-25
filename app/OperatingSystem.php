<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OperatingDevice extends Model {

	protected $table = 'operating_systems';

	protected $fillable = [
		'id',
		'os_name',
		'version',
		'created_at',
		'updated_at',
	];

	public function device() {
		return $this->hasMany('App\Device');
	}

}

