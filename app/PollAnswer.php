<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'poll_answers';
	protected $fillable = [
		'poll_id',
		'answer',
		'order',
		'color',
	];
	/**
	 * Many to Many relation
	 *
	 * @return Illuminate\Database\Eloquent\Relations\belongToMany
	 */
	public function users() {
		return $this->belongsToMany('\App\User', 'poll_user_answers', 'answer_id', 'user_id');
	}
	public function attach($groups) {
		if (is_array($groups)) {
			dd("ád");
		}

		return $this->users()->sync(array($groups));
		//}
	}

}
