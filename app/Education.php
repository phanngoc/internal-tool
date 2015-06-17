<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model {

	protected $table = 'educations';

	protected $fillable = [
		'id',
		'year_start',
		'employee_id',
		'year_end',
		'education',
	];

	public function employee(){
		return $this->belongsTo('App\Employee');

	}

}
