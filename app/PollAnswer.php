<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class PollAnswer extends Model {

	protected $table = 'poll_answers';
	protected $fillable = [
		'poll_id',
		'answer',
		'order',
		'color',
	];
	public function users() {
		return $this->belongsToMany('\App\User', 'poll_user_answers', 'answer_id', 'user_id');
	}
	public function attach($groups) {
		if (is_array($groups)) {
			dd("ád");
		}

		//dd(json_encode($groups));
		return $this->users()->sync(array($groups));
		//}
	}

}
