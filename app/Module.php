<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model {

	protected $table = 'modules';

	protected $fillable = [
		'name',
		'description',
		'version',
	];

	public function feature() {
		return $this->hasMany('App\Feature');
	}

}
