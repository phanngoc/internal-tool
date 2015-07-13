<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusRecord extends Model {

	protected $table = 'status_records';

	protected $fillable = [
		'name',
		'created_at',
		'updated_at',
	];

	public function note_statuses(){
		return $this->hasMany('App\NoteStatus', 'status_record_id', 'id');
	}

}
