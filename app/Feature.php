<?php namespace App;

//use Illuminate\Database\Eloquent\Model;
use Kalnoy;

class Feature extends Kalnoy\Nestedset\Node {

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
	 * [validate description]
	 * @param  [type] $input [description]
	 * @param  [type] $id    [description]
	 * @return [type]        [description]
	 */
	public static function validate($input, $id = null) {

		$rules = array(
			'name_feature' => 'required|unique:features,name_feature,'.$id,
			'url_action' => 'required',
			'module_id' => 'required|exists:modules,id',
		);

		return \Validator::make($input, $rules);
	}

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function module() {
		return $this->belongsTo('App\Module');
	}

	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function group() {
		return $this->belongsToMany('\App\Group', 'group_features');
	}

	/**
	 * One to One relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function feature() {
		return $this->hasOne('\App\Feature', 'id', 'parent_id');
	}

	/**
	 * Sync many to many relation
	 * @param  [mix] $groups 
	 * @return [void]        
	 */
	public function attachGroup($groups) {
		if (is_array($groups)) {
			$this->group()->sync($groups);
		} else {
			$this->group()->detach();
		}
	}
}
