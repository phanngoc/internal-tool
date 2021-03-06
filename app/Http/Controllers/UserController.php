<?php namespace App\Http\Controllers;

use App;
use App\Employee;
use App\Group;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;
use App\User;
use Illuminate\Support\Facades\Redirect;

class UserController extends AdminController {

	/**
	 * Display a listing of the resource.
	 * @return reponse
	 */
	public function index() {
		$users = User::all();
		$number = 0;
		return View('users.listuser', compact('users'))->with('number', $number);
	}

	/**
	 * Insert user and Direct to index user
	 * @param  AddUserRequest
	 * @return reponse
	 */
	public function store(AddUserRequest $request) {
		$user = new User();
		$user->username = $request['username'];
		$user->password = bcrypt($request['password']);
		$employee = Employee::find($request['employee_id']);
		$user->fullname = $employee->lastname . " " . $employee->firstname;
		$user->employee_id = $request['employee_id'];
		$user->save();
		$user->attachGroup($request['group_id']);
		return redirect()->route('users.index')->with('messageOk', 'Add user successfully!');
	}

	/**
	 * Direct to add user page
	 * @return [type]
	 */
	public function create() {
		$employees = Employee::all();
		$results = array();
		foreach ($employees as $key => $value) {
			if (count($value->user()->get()) == 0) {
				$results += array($value->id => $value->lastname . " " . $value->firstname);
			}
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
			if (count($value->user()->get()) == 0) {
				$results += array($value->id => $value->lastname . " " . $value->firstname);
			}
		}
		$emloyee_relation = User::find($id)->employee()->first();
		$fullname = $emloyee_relation->lastname . " " . $emloyee_relation->firstname;
		$user = User::find($id);
		$resultchoose = User::find($id)->employee_id;
		$results += array($resultchoose => $fullname);
		$groups = Group::lists('groupname', 'id');
		$groupssl = $user->group->lists('id');
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

		$vld = User::validate($request->all(), $id);
		if (!$vld->passes()) {
			// dd($vld->errors()->getMessages());
			return Redirect::back()->with('messageNo', $vld->errors()->getMessages()['username'][0]);
		}

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
