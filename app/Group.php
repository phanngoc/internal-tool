<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'groups';

	protected $fillable = [
		'groupname',
		'description',
	];

	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
	public function user() {
		return $this->belongsToMany('\App\User', 'user_group');
	}

	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongsToMany
	 */
	public function feature() {
		return $this->belongsToMany('\App\Feature', 'group_features');
	}

}
