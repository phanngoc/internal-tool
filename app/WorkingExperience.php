<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkingExperiences extends Model {

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
		
	];

	public function employee(){
		return $this->belongsTo('App\Employee');

	}

}
