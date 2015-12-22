<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model {

	protected $table = 'calendars';

	public function employee() {
		return $this->belongsTo('App\Employee');
	}

}
