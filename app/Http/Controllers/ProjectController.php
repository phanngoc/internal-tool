<?php namespace App\Http\Controllers;

use App\Group;
use App\Project;
use App\StatusProject;
use App\User;
use App\UserGroup;
use App\UserProject;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends AdminController {

	/**
	 * Display a listing of project
	 *
	 * @return Response
	 */
	
	public function index() {
		if (\Request::ajax()) {
			$projectsnew = array();
			$projects = Project::orderBy('id', 'DESC')->get();
			foreach ($projects as &$value) {
				$value->users;
			}
			return json_encode($projects);
		}
		return view('projects.team');
	}
	/**
	 * return json team
	 */

	public function getteam($id) {
		
		return (json_encode(\App\UserProject::orderBy('id', 'DESC')->where("project_id", "=", $id)->get()));
	
	}
	
	public function create() {

	}
	/**
	 * return json group
	 */

	public function getGroups() {
		return (json_encode(Group::where('id', '<>', 11)->get()));

	}
	/**
	 * return json user
	 */
	public function getUsers($id) {

		if ($id == "pm") {
			$idus = UserGroup::distinct()->where("group_id", "=", 6)->orWhere("group_id", "=", 11)->groupBy('user_id')->get(array("user_id"));
			$user = array();
			foreach ($idus as $key) {
				array_push($user, User::get(array("fullname", "id"))->find($key['user_id']));
			}
			return (json_encode($user));
		} else {
		
			$i = UserGroup::distinct()->where('group_id', '<>', 11)->groupBy('user_id')->get();
			
			$u = array();
			foreach ($i as $key) {
				array_push($u, User::get(array("fullname", "id"))->find($key['user_id']));
			}
			return (json_encode($u));
		}
	}
	public function getStatus() {
		//if (Request::ajax()) {
		return (json_encode(StatusProject::all()));
		//}
	}
	/**
	 * Store a newly project
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		$vld = Project::validate(\Input::all());
		if (!$vld->passes()) {
			return json_encode(array("Error" => $vld->messages()));
		}
		$project = new Project(\Input::all());
	
		$project->save();
		if ($request->get('_team')) {
			foreach ($request->get('_team') as $key => $value) {
				$value = $value + array("project_id" => $project->id);
				$vld = UserProject::validate($value);
				if (!$vld->passes()) {
					return json_encode(array("Error" => $vld->messages()));
				}
				$team = UserProject::create($value);
				$team->save();
			}
		}
		$project->users;
		return json_encode($project);
	}

	public function show($id) {
		//
	}

	
	public function edit($id) {
		//
	}


	/**
	 * Update project
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function update($id, Request $request) {
		$vld = Project::validate(\Input::all());
		if (!$vld->passes()) {
			return json_encode(array("Error" => $vld->messages()));
		}
		$project = Project::find($id);
		$project->update($request->all());
		$project->users;
	
		return json_encode($project);
		
	}

	
	/**
	 * Remove project
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function destroy($id) {
		$project = Project::find($id);
		$project->delete();
		return json_encode("success");
	}

	/**
	 * Store a newly team
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function storeTeam(Request $request) {
		$vld = UserProject::validate(\Input::all());
		if (!$vld->passes()) {
			return json_encode(array("Error" => $vld->messages()));
		}
		$team = new UserProject(\Input::all());
		$team->save();
		return json_encode($team);
	}

	/**
	 * Update team
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function updateTeam($id, Request $request) {
		$vld = UserProject::validate(\Input::all());
		if (!$vld->passes()) {
			return json_encode(array("Error" => $vld->messages()));
		}
		$team = UserProject::find($id);
		$team->update([
			'user_id' => $request->get('user_id'),
			'group_id' => $request->get('group_id'),
			'joined' => $request->get('joined'),
		]);
		return json_encode($team);
	}
	
	/**
	 * Remove team
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function destroyTeam($id, Request $request) {
		$team = UserProject::find($id);
		$team->delete();
		return json_encode("success");
	}
}
