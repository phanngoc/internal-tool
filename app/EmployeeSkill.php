<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeSkill extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'employee_skills';

	protected $fillable = [
		'employee_id',
		'skill_id',
		'month_experience',
	];

	/**
	 * One to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasOne
	 */
	public function skill() {
		return $this->hasOne('App\Skill', 'id', 'skill_id');
	}
}
