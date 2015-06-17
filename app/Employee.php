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

	public function positions() {
		return $this->belongsTo('App\Position', 'position_id', 'id');
	}

	public function user() {
		return $this->hasOne('App\User', 'id', 'user_id');
	}

	public function working_experience() {
		return $this->hasMany('App\WorkingExperience', 'employee_id', 'id');
	}

	public function educations() {
		return $this->hasMany('App\Education', 'employee_id', 'id');
	}
	public function nationalitys() {
		return $this->belongsTo('App\Nationality', 'nationality', 'id');
	}

	public function taken_project() {
		return $this->hasMany('App\TakenProject', 'employee_id', 'id');
	}
}
