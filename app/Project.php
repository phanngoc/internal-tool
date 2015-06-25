<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $table = 'projects';

	protected $fillable = [
		'projectname',
		'startdate',
		'enddate',
		'user_id',
		'comments',
		'status_id',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'projectname' => 'required',
			'startdate' => 'required|date',
			'enddate' => 'required|date',
			'user_id' => 'required|exists:users,id',
			'status_id' => 'required|exists:statusprojects,id',
		);

		return \Validator::make($input, $rules);
	}
	public function user() {
		return $this->belongsToMany('\App\User', 'user_project');
	}
	public function statusproject() {
		return $this->belongsTo('App\StatusProject', 'status_id', 'id');
	}

}
