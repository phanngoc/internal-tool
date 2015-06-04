<?php namespace App\Http\Controllers;

use App;
use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use App\UserGroup;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;


class ProjectController extends Controller {

	/*Direct to user homepage*/
	public function index() {
                $user = User::all();
		$response = array();
		foreach ($user as $key => $value) {
			$item = array("id" => $value->id, "fullname" => $value->fullname,
                            "username"=>$value->username,
                            "email"=> $value->email);
			array_push($response, $item);
		}
		echo json_encode($response);
	}

	/*Process add user to database*/
	public function store(AddUserRequest $request) {
		$user = new User();
		$user->username = $request['username'];
		$user->password = bcrypt($request['password']);
		$user->fullname = $request['fullname'];
		$user->email = $request['email'];
		$user->save();
		foreach ($request['group_id'] as $value) {
			$ug = new UserGroup();
			$ug->user_id = $user->id;
			$ug->group_id = $value;
			$ug->save();
		}
		return redirect()->route('users.index')->with('messageOk', ' Add successfully');
	}

	public function getEdit() {
            	$user = User::all();
		$response = array();
		foreach ($user as $key => $value) {
			$item = array("id" => $value->id, "fullname" => $value->fullname,
                            "username"=>$value->username,
                            "email"=> $value->email);
			array_push($response, $item);
		}
		echo json_encode($response);
		//return View('users.edittable');
	}

        /*Direct to add user page*/
	public function create() {
		$groups = Group::lists('groupname', 'id');
		return view('users.adduser', compact('groups'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$user = User::find($id);
		$groups = Group::lists('groupname', 'id');
		$groupssl = $user->group->lists('id');

		//dd($groupssl);
		if (is_null($user)) {
			return redirect()->route('users.index');
		}
		return View('users.edituser', compact('user', 'groups', 'groupssl'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update() {
		//$a = new User();
		$user = User::find(Request::input('id'));
		$user->update([
			'fullname' => Request::input('fullname'),
			'email' => Request::input('email'),
                        'username' => Request::input('username')
                        ]
                        );
		//$user->attachGroup($request['group_id']);
		$item = array("id" => $user->id, "fullname" => $user->fullname,
                            "username"=>$user->username,
                            "email"=> $user->email);
                echo json_encode($item);
	}
    
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy() {

		$user = User::find(Request::input('id'));
		$user->group()->detach();
		$user->delete();
		$item = array("id" => $user->id, "fullname" => $user->fullname,
                            "username"=>$user->username,
                            "email"=> $user->email);
                echo json_encode($item);
	}

}
