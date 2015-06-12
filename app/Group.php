<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table = 'groups';

	protected $fillable = [
		'groupname',
		'description',
	];

	public function user() {
		return $this->belongsToMany('\App\User', 'user_group');
	}
	public function feature() {
		return $this->belongsToMany('\App\Feature', 'group_features');
	}

}
