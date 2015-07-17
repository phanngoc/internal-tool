<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Nationality extends Model {

	/**
	 * The database table used by the model
	 * @var string
	 */
	protected $table = 'nationalities';

	protected $fillable = [
		'name',
	];

	/**
	 * one to many relation
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function employee() {
		return $this->hasMany('App\Employee', 'nationality');
	}

}
