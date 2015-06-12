<?php

namespace App;

use Kalnoy;

class FeatureNode extends Kalnoy\Nestedset\Node {

	protected $table = 'features';
	protected $fillable = [
		'name_feature',
		'description',
		'url_action',
		'parent_id',
		'module_id',
	];

	public function module() {
		return $this->belongsTo('App\Module');
	}
	
}