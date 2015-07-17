<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusRecord extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'status_records';

	protected $fillable = [
		'name',
		'created_at',
		'updated_at',
	];

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\hasMany
	 */
	public function note_statuses(){
		return $this->hasMany('App\NoteStatus', 'status_record_id', 'id');
	}
}
