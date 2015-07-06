<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model {

	protected $table = 'candidates';

	protected $fillable = [
		'first_name',
		'last_name',
		'date_of_birth',
		'phone',
		'email',
		'date_submit',
		'created_at',
		'updated_at',
	];

	public function files() {
		return $this->hasMany('App\File', 'candidate_id', 'id');
	}

	public function note_statuses(){
		return $this->hasMany('App\NoteStatus', 'candidate_id', 'id');
	}

	public function interview_schedules(){
		return $this->hasMany('App\InterviewSchedule', 'candidate_id', 'id');
	}

	public function positions() {
		return $this->belongsToMany('App\Position', 'candidate_positions');
	}

}
