<?php

namespace App;

use Kalnoy;

class FeatureNode extends Kalnoy\Nestedset\Node {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'features';
	protected $fillable = [
		'name_feature',
		'description',
		'url_action',
		'parent_id',
		'module_id',
		'is_menu',
	];
	
	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function module() {
		return $this->belongsTo('App\Module');
	}

}