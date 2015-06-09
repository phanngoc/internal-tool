<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Project;
use App\Projectstatus;
use App\User;
use Illuminate\Http\Request;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		if (\Request::ajax()) {
			return (json_encode(Project::all()));
		}
                $user = User::lists("id", "fullname");
		return view('project.list');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}
	public function getusers() {
		//dd("123");
		//if (Request::ajax()) {
		return (json_encode(User::get(array("id", "fullname"))));
		//}
	}
	public function getstatus() {
		//dd("123");
		//if (Request::ajax()) {
		return (json_encode(Projectstatus::all()));
		//}
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		$project = new Project();
                $project->id= $request->get("id");
		$project->projectname = $request->get('projectname');
		$project->user_id = $request->get('user_id');
		$project->status_id = $request->get('status_id');
                $project->startdate = $request->get('startdate');
                $project->enddate= $request->get('enddate');    
		$project->comments = $request->get('comments');
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
                        'id'=>$request->get('id'),
			'projectname' => $request->get('projectname'),
                        'startdate'=>$request->get('startdate'),
                        'enddate'=>$request->get('enddate'),
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

}
