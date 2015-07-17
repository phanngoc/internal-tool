<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'departments';

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
}
