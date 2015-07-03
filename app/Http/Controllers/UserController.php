<?php namespace App\Http\Controllers;

use App;
use App\Employee;
use App\Group;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use App\UserGroup;
use Illuminate\Support\Facades\Redirect;

class UserController extends AdminController {

	/*Direct to user homepage*/
	public function index() {
		$users = User::all();
		$number = 0;
		return View('users.listuser', compact('users'))->with('number', $number);
	}

	/*Process add user to database*/
	public function store(AddUserRequest $request) {
		$user = new User();
		$user->username = $request['username'];
		$user->password = bcrypt($request['password']);
		$employee = Employee::find($request['employee_id']);
		$user->fullname = $employee->lastname . " " . $employee->firstname;
		$user->employee_id = $request['employee_id'];
		$user->save();
		foreach ($request['group_id'] as $value) {
			$ug = new UserGroup();
			$ug->user_id = $user->id;
			$ug->group_id = $value;
			$ug->save();
		}

		return redirect()->route('users.index')->with('messageOk', 'Add user successfully!');
	}

	/*Direct to add user page*/
	public function create() {
		$employees = Employee::all();
		$results = array();
		foreach ($employees as $key => $value) {
			$results += array($value->id => $value->lastname . $value->firstname);
		}
		$groups = Group::lists('groupname', 'id');
		return view('users.adduser', compact('groups', 'results'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$employees = Employee::all();
		$results = array();
		foreach ($employees as $key => $value) {
			$results += array($value->id => $value->lastname . " " . $value->firstname);
		}
		$resultchoose = User::find($id)->employee_id;
		$user = User::find($id);

		$groups = Group::lists('groupname', 'id');
		$groupssl = $user->lists('id');

		//dd($groupssl);
		if (is_null($user)) {
			return redirect()->route('users.index');
		}
		return View('users.edituser', compact('user', 'groups', 'groupssl', 'results', 'resultchoose'));
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
		$password = '';
		if ($request->password != '') {
			$password = bcrypt($request->password);
		} else {
			$password = $user->password;
		}
		$employee = Employee::find($request->get('employee_id'));
		$user->update([
			'employee_id' => $request->get('employee_id'),
			'fullname' => $employee->lastname . " " . $employee->firstname,
			'username' => $request->username,
			'password' => $password,
		]);
		$user->attachGroup($request['group_id']);
		return redirect()->route('users.index')->with('messageOk', 'Update user successfully');

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
		return redirect()->route('users.index')->with('messageDelete', 'Delete user successfully!');

	}

}
