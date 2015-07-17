<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'hobbies';

	protected $fillable = [
		'id',
		'hobby',
		'employee_id',
		
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
