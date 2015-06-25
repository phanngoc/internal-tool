<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDevice extends Model {

	protected $table = 'type_devices';

	protected $fillable = [
		'id',
		'type_name',
		'description',
		'created_at',
		'updated_at',
	];

	
	public function model_device() {
		return $this->hasMany('App\ModelDevice');
	}


}
