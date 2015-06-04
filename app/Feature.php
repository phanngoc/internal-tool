<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model {

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
	public function group() {
		return $this->belongsToMany('\App\Group', 'group_features');
	}
	public function attachGroup($groups) {
		if (is_array($groups)) {
			$this->group()->sync($groups);
		} else {
			$this->group()->detach();
		}
	}
}
