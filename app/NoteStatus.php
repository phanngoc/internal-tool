<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class NoteStatus extends Model {

	protected $table = 'note_statuses';

	protected $fillable = [
		'candidate_id',
		'status_record_id',
		'comment',
		'created_at',
		'updated_at',
	];

	public function candidate() {
		return $this->belongsTo('App\Candidate');
	}

	public function status_record(){
		return $this->belongsTo('App\StatusRecord');
	}

}
