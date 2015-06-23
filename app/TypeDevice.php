<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDevice extends Model {

	protected $table = 'type_devices';

	protected $fillable = [
		'name_type',
		'description',
	];

	public function line_devices(){
		return $this->hasMany('App\LineDevice', 'type_id', 'id');
	}

}
