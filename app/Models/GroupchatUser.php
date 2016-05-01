<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Groupchat;
use DB;

class GroupchatUser extends Model {

    protected $primaryKey = 'id';
	protected $table = 'groupchat_user';

	protected $fillable = [
		'user_id',
		'group_id',
		'type',
		'is_new'
	];

	/**
	 * Create group chat for user if it haven't created yet.
	 * @param  [type] $userId [description]
	 * @param  [type] $yourId [description]
	 * @return [type]         [description]
	 */
	public function createGroupChatForUser($userId, $youId) {
		$groupUserAll = User::find($userId)->groupchat()->get();
		$groupIdUserAll = array_map(function($val) {
			return $val->id;
		},$groupUserAll->all());

		$groupYouAll = User::find($youId)->groupchat()->get();
		$groupIdYouAll = array_map(function($val) {
			return $val->id;
		},$groupYouAll->all());

		$arrCheck = array_intersect($groupIdUserAll, $groupIdYouAll);

		if (count($arrCheck) == 0) {
			$groupChatCreated = Groupchat::create([
				'name' => str_random(20),
				'count' => 2
			]);

			$groupChatUser = self::create([
				'user_id' => $userId,
				'group_id' => $groupChatCreated->id 
			]);

			$groupChatYou = self::create([
				'user_id' => $youId,
				'group_id' => $groupChatCreated->id 
			]);

			return $groupChatUser->id ;

		} else {
			return self::where('user_id', $userId)->where('group_id', head($arrCheck))->first()->id;
		}
	}
}
