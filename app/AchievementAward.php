<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class AchievementAward extends Model {

	protected $table = 'achievement_awards';

	protected $fillable = [
		'id',
		'achievement_award',
		'employee_id',
	];

	public function employee() {
		return $this->belongsTo('App\Employee');
	}

}