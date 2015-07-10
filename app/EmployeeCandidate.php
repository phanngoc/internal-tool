<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCandidate extends Model {

	protected $table = 'employees_candidates';

	protected $fillable = [
		'employee_id',
		'candidate_id',
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
