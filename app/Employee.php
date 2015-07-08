<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

	protected $table = 'employees';

	protected $fillable = [
		'employee_code',
		'firstname',
		'lastname',
		'phone',
		'position_id',
		'avatar',
		'email',
		'nationality',
		'career_objective',
		'address',
		'gender',
		'hobbies',
		'achievement_awards',
		'date_of_birth',
	];

	public function departments() {
		return $this->belongsTo('App\Position', 'position_id', 'id');
	}

	public function user() {
		return $this->hasOne('App\User', 'employee_id', 'id');
	}

	public function working_experiences() {
		return $this->hasMany('App\WorkingExperience', 'employee_id', 'id');
	}

	public function employee_skills() {
		return $this->hasMany('App\EmployeeSkill', 'employee_id', 'id');
	}

	public function skills() {
		return $this->belongsToMany('App\Skill', 'employee_skills');
	}

	/*public function group() {
	return $this->belongsToMany('\App\Group', 'user_group');
	}
	 */

	public function educations() {
		return $this->hasMany('App\Education', 'employee_id', 'id');
	}

	public function nationalitys() {
		return $this->belongsTo('App\Nationality', 'nationality', 'id');
	}

	public function taken_projects() {
		return $this->hasMany('App\TakenProject', 'employee_id', 'id');
	}

	public function device() {
		return $this->hasMany('App\Device');
	}

	public function interview_schedules() {
		return $this->hasMany('App\InterviewSchedule', 'employee_id', 'id');
	}

}
