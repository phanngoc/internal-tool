<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Groupchat;
use App\Models\GroupchatUser;
use App\Models\Message;
use Carbon\Carbon;

class ChatController extends AdminController {

	protected $groupChat;
	protected $groupChatUser;

	function __construct(Groupchat $groupChat, GroupchatUser $groupChatUser) {
		$this->groupChat = $groupChat;
		$this->groupChatUser = $groupChatUser;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	private function getFullnameFromEmployee($employee) {
		return $employee->lastname." ".$employee->firstname;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listp($id) {
		// $groupall = User::find($id)->groupchat()->get();
		// $res = array();
		// foreach ($groupall as $key_g => $value_g) {
		// 	$usergroup = GroupchatUser::Where('group_id',$value_g->id)->distinct('user_id')->get();
		// 	$user_me = GroupchatUser::Where('group_id',$value_g->id)->where('user_id',$id)->first()->id;

		// 	foreach ($usergroup as $key => $value) {
		// 		if($value->user_id != $id)
		// 		{
		// 			$usergroup_id = $value->id;
		// 			$fullname = User::find($value->user_id)->fullname;
		// 			$avatar = User::find($value->user_id)->employee()->first()->avatar;
		// 			$statuschat = User::find($value->user_id)->statuschat()->first()->id;
		// 			array_push($res,array('user_me'=> $user_me,'usergroup_id'=>$usergroup_id,'fullname'=>$fullname,'avatar'=>$avatar,'status_id'=>$statuschat));
		// 		}
		// 	}
		// }
		
		// $this->groupChatUser->createGroupChatForUser(6, 8);

		$users = User::all();
		$res = array();
		foreach ($users as $key => $value) {
			if ($value->id != $id) {
				$usergroup_id = 0;
				$fullname = $this->getFullnameFromEmployee(User::find($value->id)->employee()->first());
				$avatar = User::find($value->id)->employee()->first()->avatar;
				$statuschat = User::find($value->id)->statuschat()->first()->id;
				array_push($res, array('user_me'=> $value->id, 'usergroup_id' => $usergroup_id, 'fullname'=>$fullname,'avatar'=>$avatar,'status_id'=>$statuschat));
			}
		}
		echo json_encode($res);
	}

	/**
	 * [notifyPostNew description]
	 * @param  [type] $id   [description]
	 * @param  [type] $time [description]
	 * @return [type]       [description]
	 */
	public function notifyPostNew($id, $time)
	{
		$groupChatUserMe = GroupchatUser::find($id);
		$group_id = $groupChatUserMe->group_id;
		$groupChatUserMe->update([
			'is_new' => 0,
		]);
		$groupchatusers = GroupchatUser::where('group_id', $group_id)->get();
		
		$objmessages = Message::where('time','>',$time)->orderBy('time', 'asc');
		$objmessages->where(function($query) use ($groupchatusers, $id) {
			foreach ($groupchatusers as $key => $value) {
				$query->orWhere('ug_id', $value->id);
			}
		});	

		$messages = $objmessages->get();
		$res = array();
		foreach ($messages as $k_message => $v_message) {
			$user = User::find(GroupchatUser::find($v_message->ug_id)->user_id);
			$fullname = $this->getFullnameFromEmployee($user->employee()->first());
			$avatar = $user->employee()->first()->avatar;
			$item = array(
				'message' => $v_message->message,
				'usergroup_id' => $v_message->ug_id,
				'time' => $v_message->time,
				'fullname' => $fullname,
				'avatar' => $avatar
			);
			array_push($res,$item);
		}
		echo json_encode($res);
	}

	/**
	 * Get list chat from people.
	 * @param  Request $request [description]
	 * @param  [type]  $id      [description]
	 * @param  [type]  $yourId  [description]
	 * @return [type]           [description]
	 */
	public function getChatFromPeople(Request $request, $id, $yourId) {
		
		if ($id != 0) {
			$groupUserId = $id;
		} else {
			$groupUserId = $this->groupChatUser->createGroupChatForUser(Auth::user()->id, $yourId);
		}

		$groupUserMeId = GroupchatUser::where('id', $groupUserId)->first();
		$groupUserMeId->update([
			'is_new' => 0
		]);
		$groupchatusers = GroupchatUser::where('group_id', $groupUserMeId->group_id)->get();
		
		$time = $request->input('time');

		if ($time != null) {
			$objmessages = Message::where('time', '<', $time);
		} else {
			$objmessages = Message::where('time', '>', 0);
		}

		$objmessages->where(function($query) use ($groupchatusers, $id) {
			// dd('co vao');
			$query->where('ug_id', $id);
			foreach ($groupchatusers as $key => $value) {
				$query->orWhere('ug_id', $value->id);
			}
		});		

		$objmessages->orderBy('time', 'desc')->limit(10);
		$messages = $objmessages->get()->reverse();

		$res = array('group_user_id' => $groupUserMeId->id);
		$res['messages'] = array();
		foreach ($messages as $k_message => $v_message) {
			$user = User::find(GroupchatUser::find($v_message->ug_id)->user_id);
			$fullname = $this->getFullnameFromEmployee($user->employee()->first());
			$avatar = $user->employee()->first()->avatar;

			$item = array(
				'message' => $v_message->message,
				'usergroup_id' => $v_message->ug_id,
				'time' => $v_message->time,
				'fullname' => $fullname,
				'avatar' => $avatar
			);
			array_push($res['messages'], $item);
		}
		echo json_encode($res);
	}
	
	/**
	 * Post data chat from user.
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function postChatFromPeople(Request $request)
	{
		$data = $request->data;
		$groupId = $this->groupChatUser->find($data['usergroup_id'])->group_id;
		$groupChatYouId = $this->groupChatUser->where('user_id', $data['user_me'])->where('group_id', $groupId)->first();
		$groupChatYouId->update([
			'is_new' => 1
		]);

		Message::create([
			'message' => $data['message'],
			'ug_id' => $data['usergroup_id'],
			'time' => time(),
		]);
		echo time();
	}

	/**
	 * Notify new message from friend.
	 * @return [type] [description]
	 */
	public function notifyNewMessageToFriend() 
	{
		$groupChatNews = $this->groupChatUser->where('user_id', Auth::user()->id)->where('is_new', '1')->get();
		if (count($groupChatNews) > 0) {
			$arrYouIsNew = array_map(function($value) {
				$groupChatUser = $this->groupChatUser->where('group_id', $value['group_id'])->where('user_id', '<>', Auth::user()->id)->first();
				return $groupChatUser->user_id;
			}, $groupChatNews->toArray());
		} else {
			$arrYouIsNew = array();
		}
		
		echo json_encode($arrYouIsNew);
	}

	public function turnOffNewMessageFromMe() {

	}
}
