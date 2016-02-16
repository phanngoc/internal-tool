<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'thread';

	protected $fillable = [
      'header',
      'avatar',
      'sent_to'
	];

  /**
   * Relation with notify.
   * @return [type] [description]
   */
  public function notify() {
    return $this->hasMany('App\Models\Notify','thread_id','id');
  }

  public function employee() {
    return $this->belongsTo('App\Employee','sent_to','id');
  }
}
