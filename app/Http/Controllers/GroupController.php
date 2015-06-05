<?php namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\AddGroupRequest;
use App\Http\Requests\EditGroupRequest;
use App\Module;
use App\User;
use Request;

class GroupController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $group;

	function __construct(Group $group) {
		parent::__construct();
		$this->group = $group;
	}

	public function index() {

		$groups = $this->group->all();
		if (Request::ajax()) {
			$groups = $this->group->get(array("id", "groupname"));
			return (json_encode($groups));
		}
		return view('groups.listgroup', compact('groups'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('groups.addgroup');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddGroupRequest $request) {
		$groupname = $request->input('groupname');
		$description = $request->input('description');
		Group::create([
			'groupname' => $groupname,
			'description' => $description,
		]);
		return redirect()->route('groups.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$groups = Group::Find($id);
		return view('groups.editgroup', compact('groups'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditGroupRequest $request) {
		$groups = Group::find($id);

		$groups->update([
			'groupname' => $request->get('groupname'),
			'description' => $request->get('description'),
		]);

		return redirect()->route('groups.index');
	}

	public function getPermission($id) {
		$group = Group::findOrFail($id);
		// $resources = \AdminResource::$resources;
		// $currentPers = json_decode($group['permissions']);
		// $this->layout->content = View::make('admin.groups.permission', array(
		// 			'group' => $group,
		// 			'resources' => $resources,
		// 			'currentPers' => $currentPers
		// ));
		$features = $group->feature()->get();
		$featurecheck = array();
		foreach ($features as $key => $value) {
			array_push($featurecheck, $value->id);
		}

		$modules = Module::all();
		return view('groups.permission', compact('modules', 'featurecheck', 'group'));
	}

	/**
	 * Post and save list permissions of group based on group id
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postPermission($id) {
		$permissions = Request::input('permissions');
		$id_group = Request::input('id_group');
		Group::find($id_group)->feature()->sync($permissions);
		// foreach ($permissions as $k_permission => $v_permission) {
		// 	Group::find($id)->feature()->($v_permission);
		// }
		// $group = AdminGroup::findOrFail($id);
		// $permissions = Input::get('permissions');
		// $fullPerStr = implode(',', $permissions);
		// $group->savePermission($fullPerStr);
		// Session::flash('success', Lang::get('messages.group_permission_saved', array('name' => $group->name)));
		return redirect()->route('groups.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$groups = Group::find($id);
		$groups->user()->detach();
		$groups->delete('');
		return redirect()->route('groups.index');
	}

}
