<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryFeature extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category_feature';

	const TASK = 1;
	
	const BUG = 2;

	protected $fillable = [
		'name',
	];

	/**
	 * [validate description]
	 * @param  [type] $input [description]
	 * @param  [type] $id    [description]
	 * @return [type]        [description]
	 */
	public static function validate($input, $id = null) {

		$rules = array(
			'name' => 'required|unique:category_feature,name',
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
