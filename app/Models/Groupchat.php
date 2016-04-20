<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Groupchat extends Model {

    protected $primaryKey = 'id';
	protected $table = 'groupchat';

	protected $fillable = [
		'name',
		'count'
	];
	public function user() {
		return $this->belongsToMany('\App\User', 'groupchat_user','group_id','user_id');
	}
}
