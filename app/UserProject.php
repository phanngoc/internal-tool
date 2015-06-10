<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProject extends Model {

	protected $table = 'user_project';
	protected $fillable = [
		'user_id',
		'project_id',
		'group_id',
		'joined',
	];

}
