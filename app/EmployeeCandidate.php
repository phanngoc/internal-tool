<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCandidate extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'employees_candidates';

	protected $fillable = [
		'employee_id',
		'candidate_id',
		'position_id',
		'time_interview',
		'time',
		'created_at',
		'updated_at',
	];

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function candidate(){
		return $this->belongsTo('App\Candidate', 'candidate_id', 'id');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee(){
		return $this->belongsTo('App\Employee', 'employee_id', 'id');
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function position(){
		return $this->belongsTo('App\Position', 'position_id', 'id');
	}

}
