<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobby extends Model {

	protected $table = 'hobbies';

	protected $fillable = [
		'id',
		'hobby',
		'employee_id',
		
	];

	public function employee(){
		return $this->belongsTo('App\Employee');
	}

}
