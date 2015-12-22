<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'timesheets';

	protected $fillable = [
		'taskname',
		'start',
		'end',
		'duration',
		'project_id',
		'status_id',
		'comments',
	];

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function project()
	{
		return $this->belongsTo('App\Project','project_id','id');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function projectstatus()
	{
		return $this->belongsTo('App\Projectstatus','status_id','id');
	}

}
