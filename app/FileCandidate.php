<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FileCandidate extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'filecandidates';

	protected $fillable = [
		'candidate_id',
		'name',
		'title',
		'created_at',
		'updated_at',
	];

}
