<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DescriptionSign extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'description_sign';

	protected $fillable = [
		'sign',
		'mean',
	];

}
