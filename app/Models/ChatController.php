<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use App\User;
use App\Models\Groupchat;
use App\Models\GroupchatUser;
use App\Models\Message;

class ChatController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function listp($id) {
		$groupall = User::find($id)->groupchat()->get();
		$res = array();
		foreach ($groupall as $key_g => $value_g) {
			$usergroup = GroupchatUser::Where('group_id',$value_g->id)->distinct('user_id')->get();
			$user_me = GroupchatUser::Where('group_id',$value_g->id)->where('user_id',$id)->first()->id;

			// foreach ($usergroup as $key => $value) {
			// 	if($value->user_id == $id && $value_g->id == )
			// 	{
			// 		$usergroup_id = $value->id;
			// 		$fullname = User::find($value->user_id)->fullname;
			// 		$avatar = User::find($value->user_id)->employee()->first()->avatar;
			// 		$statuschat = User::find($value->user_id)->statuschat()->first()->id;
			// 		$user_me = $value->id;	
			// 		array_push($res,array('user_me'=> $user_me,'usergroup_id'=>$usergroup_id,'fullname'=>$fullname,'avatar'=>$avatar,'status_id'=>$statuschat));
			// 	}
			// }

			foreach ($usergroup as $key => $value) {
				if($value->user_id != $id)
				{
					$usergroup_id = $value->id;
					$fullname = User::find($value->user_id)->fullname;
					$avatar = User::find($value->user_id)->employee()->first()->avatar;
					$statuschat = User::find($value->user_id)->statuschat()->first()->id;
					array_push($res,array('user_me'=> $user_me,'usergroup_id'=>$usergroup_id,'fullname'=>$fullname,'avatar'=>$avatar,'status_id'=>$statuschat));
				}
			}
		}
		echo json_encode($res);
	}

	public function notifyPostNew($id,$time)
	{
		$group_id = GroupchatUser::find($id)->group_id;
		$groupchatusers = GroupchatUser::where('group_id',$group_id)->get();
		
		$objmessages = Message::where('ug_id',$id);
		// foreach ($groupchatusers as $key => $value) {
		// 	$objmessages->orWhere('ug_id',$value->id);
		// }
	    // $timemax = $objmessages->max('time');
	    
		$messages = $objmessages->Where('time','>',$time)->orderBy('time', 'asc')->get();
	

		$res = array();
		foreach ($messages as $k_message => $v_message) {
			$user = User::find(GroupchatUser::find($v_message->ug_id)->user_id);
			$fullname = $user->fullname;
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

	public function getChatFromPeople($id) {
		$group_id = GroupchatUser::find($id)->group_id;
		$groupchatusers = GroupchatUser::where('group_id',$group_id)->get();
		

		$objmessages = Message::where('ug_id',$id);
		foreach ($groupchatusers as $key => $value) {
			$objmessages->orWhere('ug_id',$value->id);
		}
		$messages = $objmessages->orderBy('time', 'asc')->limit(10)->get();

		$res = array();
		foreach ($messages as $k_message => $v_message) {
			$user = User::find(GroupchatUser::find($v_message->ug_id)->user_id);
			$fullname = $user->fullname;
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
	public function postChatFromPeople(Request $request)
	{
		$data = $request->data;
		Message::create([
			'message' => $data['message'],
			'ug_id' => $data['user_me'],
			'time' => time(),
		]);
		echo time();
	}
}
