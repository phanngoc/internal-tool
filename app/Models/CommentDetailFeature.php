<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentDetailFeature extends Model {

	protected $table = 'comment_detail_features';

	protected $fillable = [
		'content',
		'employee_id',
		'detail_feature_id'
	];

  public function author() {
    return $this->belongsTo('App\Employee','employee_id','id');
  }

}
