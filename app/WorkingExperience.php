<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingExperience extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'working_experiences';

	protected $fillable = [
		'id',
		'project_name',
		'employee_id',
		'role',
		'company',
		'main_duties',
		'project_period',
		'skill_set_ultilized',
		'year_start',
		'year_end',
		'customer_name',
		'number_people',
		'project_description',
		'position',
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
