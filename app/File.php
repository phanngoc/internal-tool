<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'files';

	protected $fillable = [
		'candidate_id',
		'name',
		'title',
		'created_at',
		'updated_at',
	];

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function candidate() {
		return $this->belongsTo('App\Candidate');
	}

}
