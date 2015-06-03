<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model {

	protected $table = 'timesheets';

	protected $fillable = [
		'taskname',
		'start',
		'end',
		'project_id',
		'status_id',
		'comments',
		;
	];

	public function project()
	{
		return $this->belongsTo('App\Project','project_id','id');
	}

	public function projectstatus()
	{
		return $this->belongsTo('App\Projectstatus','status_id','id');
	}

}
