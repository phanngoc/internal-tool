<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySkill extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'category_skills';

	protected $fillable = [
		'id',
		'category_name',
	];

	/**
	 * Validate category name skill
	 * 
	 * @param  [type] $input 
	 * @param  [int] $id
	 * @return Validator
	 */
	public static function validate($input, $id = null) {
		$rules = array(
			'category_name' => 'required',
		);
		return \Validator::make($input, $rules);
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function skill() {
		return $this->hasMany('\App\Skill', 'category_id')->select("id", "category_id", "skill");
	}
}
