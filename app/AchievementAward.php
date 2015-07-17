<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AchievementAward extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'achievement_awards';

	protected $fillable = [
		'id',
		'achievement_award',
		'employee_id',
	];

	/**
	 * One to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function employee() {
		return $this->belongsTo('App\Employee');
	}
}