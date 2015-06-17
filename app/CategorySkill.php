<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySkill extends Model {
	protected $table = 'category_skills';

	protected $fillable = [
		'id',
		'category_name',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'category_name' => 'required',
		);

		return \Validator::make($input, $rules);
	}
	public function skill() {
		return $this->hasMany('\App\Skill', 'category_id');
	}
	//

}
