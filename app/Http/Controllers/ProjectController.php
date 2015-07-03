<?php namespace App\Http\Controllers;

use App\Group;
use App\Project;
use App\StatusProject;
use App\User;
use App\UserGroup;
use App\UserProject;
use Illuminate\Http\Request;

class ProjectController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	/*public function memberProject($project) {
	$listname = $project->users;
	foreach ($listname as $key => $value) {
	if ($strmember == "") {
	$strmember = $value->fullname;
	} else {
	$strmember = $strmember . "\r\n" . $value->fullname;
	}
	}
	$haha = get_object_vars($project);
	dd(json_encode($haha));
	$project->comments = "123123123";

	return $project;
	$proj = array(
	'id' => $value['id'],
	'project_name' => $value['project_name'],
	'start_date' => $value['start_date'],
	'end_date' => $value['end_date'],
	'user_id' => $value['user_id'],
	'status_id' => $value['status_id'],
	'comments' => $value['comments'],
	);
	$arraymember = $value->user->lists('fullname', 'id');
	$strmember = "";
	foreach ($arraymember as $key => $vl) {
	if ($strmember == "") {
	$strmember = $vl;
	} else {
	$strmember = $strmember . "\r\n" . $vl;
	}

	}
	if ($strmember == "") {
	$strmember = "null";
	}

	$proj = $proj + array('listname' => $strmember);
	return $proj;
	}*/
	public function index() {
		if (\Request::ajax()) {
			$projectsnew = array();
			$projects = Project::orderBy('id', 'DESC')->get();
			foreach ($projects as &$value) {
				$value->users;
				//array_push($projectsnew, $this->memberProject($value));
			}
			return (json_encode($projects));
		}
		return view('projects.team');
	}

	public function getteam($id) {
		//if (\Request::ajax()) {
		return (json_encode(\App\UserProject::orderBy('id', 'DESC')->where("project_id", "=", $id)->get()));
		//}
		//return view('index');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {

	}
	public function getGroups() {
		return (json_encode(Group::where('id', '<>', 11)->get()));

	}
	public function getUsers($id) {
		//dd($id);
		if ($id == "pm") {
			$idus = UserGroup::distinct()->where("group_id", "=", 6)->orWhere("group_id", "=", 11)->groupBy('user_id')->get(array("user_id"));
			$user = array();
			foreach ($idus as $key) {
				array_push($user, User::get(array("fullname", "id"))->find($key['user_id']));
			}
			return (json_encode($user));
		} else {
			//$i = UserGroup::whereIn('group_id', [6, 7, 8, 9])->distinct('user_id')->get();
			//$i = UserGroup::where("group_id", "<>", 11)->distinct('user_id')->get();
			$i = UserGroup::distinct()->where('group_id', '<>', 11)->groupBy('user_id')->get();
			//dd(json_encode($i));
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		$vld = Project::validate(\Input::all());
		if (!$vld->passes()) {
			return json_encode(array("Error" => $vld->messages()));
		}
		$project = new Project(\Input::all());
		/*$project->projectname = $request->get('projectname');
		$project->user_id = $request->get('user_id');
		$project->startdate = $request->get('startdate');
		$project->enddate = $request->get('enddate');
		$project->status_id = $request->get('status_id');
		$project->comments = $request->get('comments');*/
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

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {
		$vld = Project::validate(\Input::all());
		if (!$vld->passes()) {
			return json_encode(array("Error" => $vld->messages()));
		}
		$project = Project::find($id);
		$project->update($request->all());
		$project->users;
		/*$project->update([
		'projectname' => $request->get('projectname'),
		'startdate' => $request->get('startdate'),
		'enddate' => $request->get('enddate'),
		'user_id' => $request->get('user_id'),
		'status_id' => $request->get('status_id'),
		'comments' => $request->get('comments'),
		]);*/
		return json_encode($project);
		//return redirect()->route('groups.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$project = Project::find($id);
		$project->delete();
		return json_encode("success");
	}
	public function storeTeam(Request $request) {
		$vld = UserProject::validate(\Input::all());
		if (!$vld->passes()) {
			return json_encode(array("Error" => $vld->messages()));
		}
		$team = new UserProject(\Input::all());
		$team->save();
		return json_encode($team);
	}
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
	public function destroyTeam($id, Request $request) {
		$team = UserProject::find($id);
		$team->delete();
		return json_encode("success");
	}
}
