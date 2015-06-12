<?php namespace App\Http\Controllers;

use App\Group;
use App\Http\Controllers\Controller;
use App\Project;
use App\StatusProject;
use App\User;
use App\UserGroup;
use App\UserProject;
use Illuminate\Http\Request;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		/*$array = array('lastname', 'email', 'phone');
		$comma_separated = implode("<br>", $array);
		echo $comma_separated;*/
		//return;
		if (\Request::ajax()) {
			$projectsnew = array();
			$projects = Project::all();
			foreach ($projects as $key => $value) {
				$proj = array(
					'id' => $value['id'],
					'projectname' => $value['projectname'],
					'startdate' => $value['startdate'],
					'enddate' => $value['enddate'],
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
				array_push($projectsnew, $proj);
			}
			//dd(json_encode($projectsnew));
			return (json_encode($projectsnew));
		}
		return view('projects.team');
	}
	public function getteam($id) {
		//if (\Request::ajax()) {
		return (json_encode(\App\UserProject::where("project_id", "=", $id)->get()));
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
			$idus = UserGroup::where("group_id", "=", 6)->orWhere("group_id", "=", 11)->distinct('user_id')->get(array("user_id"));
			$user = array();
			foreach ($idus as $key) {
				array_push($user, User::find($key['user_id']));
			}
			return (json_encode($user));
		} else {

			return (json_encode(User::all()));
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
		$project = new Project(\Input::all());
		/*$project->projectname = $request->get('projectname');
		$project->user_id = $request->get('user_id');
		$project->startdate = $request->get('startdate');
		$project->enddate = $request->get('enddate');
		$project->status_id = $request->get('status_id');
		$project->comments = $request->get('comments');*/
		$project->save();
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
		$project = Project::find($id);

		$project->update([
			'projectname' => $request->get('projectname'),
			'startdate' => $request->get('startdate'),
			'enddate' => $request->get('enddate'),
			'user_id' => $request->get('user_id'),
			'status_id' => $request->get('status_id'),
			'comments' => $request->get('comments'),
		]);
		return "ok";
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
	}
	public function storeTeam(Request $request) {
		$team = new UserProject(\Input::all());
		$team->save();
		return json_encode($team);
	}
	public function updateTeam($id, Request $request) {
		$team = UserProject::find($id);
		$team->update([
			'user_id' => $request->get('user_id'),
			'group_id' => $request->get('group_id'),
			'joined' => $request->get('joined'),
		]);
	}
	public function destroyTeam($id, Request $request) {
		$team = UserProject::find($id);
		$team->delete();
	}
}
