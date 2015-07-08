<?php namespace App;

//use Illuminate\Database\Eloquent\Model;
use Kalnoy;

class Feature extends Kalnoy\Nestedset\Node {

	protected $table = 'features';

	protected $fillable = [
		'name_feature',
		'description',
		'url_action',
		'parent_id',
		'module_id',
		'is_menu',
	];

	public function module() {
		return $this->belongsTo('App\Module');
	}
	public function group() {
		return $this->belongsToMany('\App\Group', 'group_features');
	}
	public function feature() {
		return $this->hasOne('\App\Feature', 'id', 'parent_id');
	}
	public function attachGroup($groups) {
		if (is_array($groups)) {
			$this->group()->sync($groups);
		} else {
			$this->group()->detach();
		}
	}
}
