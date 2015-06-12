<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model {

	protected $table = 'position';

	protected $fillable = [
		'name',
		'description'
	];

	public function employees() {
		return $this->hasMany('App\Employee');
	}
}
