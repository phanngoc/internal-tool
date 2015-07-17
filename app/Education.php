<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'educations';

	protected $fillable = [
		'id',
		'year_start',
		'employee_id',
		'year_end',
		'education',
	];

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee(){
		return $this->belongsTo('App\Employee');

	}
}
