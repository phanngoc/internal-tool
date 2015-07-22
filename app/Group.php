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
	 * [validate description]
	 * @param  [type] $input [description]
	 * @param  [type] $id    [description]
	 * @return [type]        [description]
	 */
	public static function validate($input, $id = null) {

		$rules = array(
			'groupname' => 'required|unique:groups,groupname,' . $id,
		);

		return \Validator::make($input, $rules);
	}
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
