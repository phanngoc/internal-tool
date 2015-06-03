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
		'status_id'
	];

	public function projectstatus()
	{
		return $this->belongsTo('App\Project','status_id','id');
	}

}