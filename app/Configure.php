<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Configure extends Model {

	protected $table = 'configures';

	protected $fillable = [
		'value',
		'description',
	];

}
