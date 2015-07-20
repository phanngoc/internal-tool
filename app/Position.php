<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {

	protected $table = 'position';

	protected $fillable = [
		'name',
		'description'
	];
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function employees() {
		return $this->hasMany('App\Employee');
	}
	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongToMany
	 */
	public function candidates() {
		return $this->belongsToMany('App\Candidate', 'candidate_positions');
	}
}
