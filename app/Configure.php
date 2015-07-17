<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Configure extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'configures';

	protected $fillable = [
		'value',
		'description',
	];

}
