<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	protected $table = 'projects';
	protected $hidden = ['created_at', 'updated_at', 'pivot'];
	protected $fillable = [
		'project_name',
		'start_date',
		'end_date',
		'user_id',
		'comments',
		'status_id',
	];
	public static function validate($input, $id = null) {

		$rules = array(
			'project_name' => 'required',
			'start_date' => 'required|date',
			'end_date' => 'required|date',
			'user_id' => 'required|exists:users,id',
			'status_id' => 'required|exists:statusprojects,id',
		);

		return \Validator::make($input, $rules);
	}
	public function users() {
		return $this->belongsToMany('\App\User', 'user_project')->select('users.id', 'fullname');
	}
	public function statusprojects() {
		return $this->belongsTo('App\StatusProject', 'status_id', 'id');
	}

}
