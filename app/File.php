<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

	protected $table = 'files';

	protected $fillable = [
		'candidate_id',
		'name',
		'created_at',
		'updated_at',
	];

	public function candidate() {
		return $this->belongsTo('App\Candidate');
	}

}
