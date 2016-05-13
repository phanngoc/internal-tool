<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailFeature extends Model {

	protected $table = 'detailfeature';

	protected $fillable = [
		'name',
		'description',
		'startdate',
		'enddate',
		'featureproject_id',
		'status_id',
		'priority_id',
		'category_feature_id',
		'done'
	];

	/**
	 * Validate
	 * @return validator
	 */
	public static function validate($input, $id = null) {

		$rules = array(
			"name" => "required|min:2|max:255",
			"featureproject_id" => "required",
			"status_id" => "required",
			"priority_id" => "required",
			"category_feature_id" => "required",
			"done" => "required|numeric",
			"startdate" => "required",
			"enddate" => "required"
		);

		if ($id == null) {
			$rules['name'] = "required|min:2|max:255|unique:detailfeature,name";
		}
		return \Validator::make($input, $rules);
	}

	public function scopeTaskNoClosed($query)
    {
        return $query->where('votes', '>', 100);
    }

	public function featureproject() {
		return $this->belongsTo('App\FeatureProject');
	}

	public function employees() {
		return $this->belongsToMany('App\Employee', 'employee_detailfeature');
	}

	public function status() {
		return $this->belongsTo('App\StatusProject','status_id','id');
	}

	public function priority() {
		return $this->belongsTo('App\Priority','priority_id','id');
	}

	public function category_feature() {
		return $this->belongsTo('App\CategoryFeature','category_feature_id','id');
	}

	public function comment_detail_features() {
		return $this->hasMany('App\Models\CommentDetailFeature','detail_feature_id','id');
	}
}
