<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model {

	protected $table = 'employees';

	protected $fillable = [
		'firstname',
		'lastname',
		'employee_code',
		'user_id',
		'phone',
		'position_id',
	];

	public function position() 
	{
		return $this->belongsTo('App\Position','position_id','id');
	}

	public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
