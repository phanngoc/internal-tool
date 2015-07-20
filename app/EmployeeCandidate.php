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
		'created_at',
		'updated_at',
	];
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function candidate(){
		return $this->belongsTo('App\Candidate');
	}
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee(){
		return $this->belongsTo('App\Employee');
	}

}
