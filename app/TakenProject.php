<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TakenProject extends Model {

	protected $table = 'taken_projects';

	protected $fillable = [
		'id',
		'employee_id',
		'project_name',
		'role',
		'project_period',
		'skill_set_ultilized',
		'customer_name',
		'number_member',
		'project_description',
	];

	public function employee() {
		return $this->belongsTo('App\Employee');
	}

}
