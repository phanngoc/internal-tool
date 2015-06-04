<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Project;
use App\User;

class ProjectController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$project = Project::all();
		$response = array();
		foreach ($project as $key => $value) {
			$item = array("projectname" => $value->projectname,
				"startdate" => $value->startdate,
				"enddate" => $value->enddate,
				"comments" => $value->comments,
				"pm" => $value->pm,
				"status" => $value->status_id,
			);

			array_push($response, $item);
		}
		return json_encode($response);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}
	public function view() {
		$users = User::all();
		return View('project.list', compact('users'));
	}
	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$user = User::all();
		$response = array();
		foreach ($user as $key => $value) {
			$item = array("id" => $value->id, "fullname" => $value->fullname,
				"username" => $value->username,
				"email" => $value->email);
			array_push($response, $item);
		}
		echo json_encode($response);
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
	public function update($id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
