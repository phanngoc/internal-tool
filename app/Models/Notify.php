<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notify extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'notify';

	protected $fillable = [
      'content',
      'thread_id',
      'is_read',
      'link',
			'sent_to'
	];

  /**
   * [thread description]
   * @return [type] [description]
   */
  public function thread() {
    return $this->belongsTo('App\Models\Thread','thread_id','id');
  }
}
