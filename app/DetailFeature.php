<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailFeature extends Model {

	protected $table = 'detailfeature';

	protected $fillable = [
		'name',
		'startdate',
		'enddate',
	];

	public function featureproject() {
		return $this->belongsTo('App\FeatureProject');
	}
	public function employees() {
		return $this->belongsToMany('App\Employee', 'employee_detailfeature');
	}
}
