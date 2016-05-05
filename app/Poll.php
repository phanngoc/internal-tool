<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model {

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'polls';

	protected $fillable = [
		'question',
		'active',
		'start_date',
		'end_date',
		'num_select',
		'votes_per_day',
		// 'total_votes_per_person',
		// 'show_results',
		'show_results_req_vote',
		'show_results_finish',
		'show_vote_number',
		'result_precision',
	];

	/**
	 * validate
	 * @return Validator
	 */
	public static function validate($input, $id = null) {
		$rules = array(
			'question' => 'required',
			'active' => 'boolean',
			'start_date' => 'required|date',
			'end_date' => 'required|date',
			'num_select' => 'numeric',
			'votes_per_day' => 'numeric',
			// 'total_votes_per_person' => 'numeric',
			'show_results' => 'boolean',
			'show_results_req_vote' => 'boolean',
			'show_results_finish' => 'boolean',
			'show_vote_number' => 'boolean',
		);
		return \Validator::make($input, $rules);
	}

	/**
	 * One to many relation
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function answers() {
		return $this->hasMany("App\PollAnswer")->orderBy('order', 'asc');
	}

	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
	public function employee() {
		return $this->belongsToMany('\App\Employee', 'poll_employee', 'poll_id', 'employee_id');
	}
}
