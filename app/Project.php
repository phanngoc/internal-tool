<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $table = 'projects';

	protected $fillable = [
		'projectname',
		'startdate',
		'enddate',
		'user_id',
		'comments',
		'status_id',
	];
	public function user() {
		return $this->belongsToMany('\App\User', 'user_project');
	}
	public function statusproject() {
		return $this->belongsTo('App\StatusProject', 'status_id', 'id');
	}

}
