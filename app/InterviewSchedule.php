<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewSchedule extends Model {

	protected $table = 'interview_schedules';

	protected $fillable = [
		'employee_id',
		'candidate_id',
		'time_interview',
		'created_at',
		'updated_at',
	];

	public function candidate(){
		return $this->belongsTo('App\Candidate');
	}

	public function employee(){
		return $this->belongsTo('App\Employee');
	}

}
