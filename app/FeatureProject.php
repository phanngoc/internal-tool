<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProject extends Model {

	protected $table = 'featureproject';

	protected $fillable = [
		'name',
		'description',
	];

	public function detailfeatures() {
		return $this->hasMany('App\DetailFeature','featureproject_id','id');
	}
}
