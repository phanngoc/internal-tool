<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model {

    protected $primaryKey = 'id';
	protected $table = 'messages';

	protected $fillable = [
		'message',
		'time',
		'ug_id',
		'time'
	];

	public function groupchat() {
		return $this->belongsTo('App\Models\Groupchat','ug_id','id');
	}
}
