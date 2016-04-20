<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupchatUser extends Model {

    protected $primaryKey = 'id';
	protected $table = 'groupchat_user';

	protected $fillable = [
		'user_id',
		'group_id',
		'choice'
	];

}
