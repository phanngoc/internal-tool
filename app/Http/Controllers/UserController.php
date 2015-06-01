<?php namespace App\Http\Controllers;

use App;
use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use App\UserGroup;
use Illuminate\Support\Facades\Redirect;

class UserController extends AdminController {

	/*Direct to user homepage*/
	public function index() {
		$users = User::all();
		return View('users.listuser', compact('users'));
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
	public function update($id, EditUserRequest $request) {
		//$a = new User();
		$user = User::find($id);
		$user->update([
			'fullname' => $request->get('fullname'),
			'email' => $request->get('email')]);
		$user->attachGroup($request['group_id']);
		return redirect()->route('users.index')->with('messageOk', 'user update successfully');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		$users = User::find($id);
		$users->group()->detach();
		$users->delete();
		return redirect()->route('users.index');

	}

}
