<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Projectstatus extends Model {

	protected $table = 'projectstatus';

	protected $fillable = [
		'name'
	];

	public function projects() {
		return $this->hasMany('App\Project','status_id','id');
	}

}
