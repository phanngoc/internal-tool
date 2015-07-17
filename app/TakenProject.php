<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TakenProject extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'taken_projects';

	protected $fillable = [
		'id',
		'employee_id',
		'project_name',
		'role',
		'project_period',
		'skill_set_ultilized',
		'customer_name',
		'number_people',
		'project_description',
	];
	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee() {
		return $this->belongsTo('App\Employee');
	}

}
