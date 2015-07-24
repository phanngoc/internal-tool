<?php namespace App\Http\Controllers;

use App\Group;
use App\Http\Requests\AddGroupRequest;
use App\Http\Requests\EditGroupRequest;
use App\Module;
use App\User;
use Illuminate\Http\Request;

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
		$number = 0;
		return view('groups.listgroup', compact('groups'))->with('number', $number);
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
		return redirect()->route('groups.index')->with('messageOk', 'Add group successfully!');
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
	public function update($id, Request $request) {
		$vld = Group::validate($request->all(),$id);
		if (!$vld->passes()) {
			return \Redirect::back()->withErrors($vld->messages());
		}
		$groups = Group::find($id);

		$groups->update([
			'groupname' => $request->get('groupname'),
			'description' => $request->get('description'),
		]);

		return redirect()->route('groups.index')->with('messageOk', 'Update group successfully!');
	}

	public function getPermission($id) {
		$group = Group::findOrFail($id);
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
		$groups->feature()->detach();
		$groups->delete('');
		return redirect()->route('groups.index')->with('messageOk', 'Delete group successfully!');
	}

}
