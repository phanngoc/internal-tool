<?php namespace App\Http\Controllers;

use App\StatusProject;
use Illuminate\Http\Request;

class StatusProjectController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		if (\Request::ajax()) {
			$sttproject = StatusProject::orderBy('id', 'DESC')->get();
			return json_encode($sttproject);
		}
		return view('statusprojects.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return json
	 */
	public function store() {
		$vld = StatusProject::validate(\Input::all());
		if ($vld->passes()) {
			$statusproject = new StatusProject(\Input::all());
			$statusproject->save();
			return json_encode($statusproject);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return json
	 */
	public function update($id) {
		$statusproject = StatusProject::find($id);
		$vld           = StatusProject::validate(\Input::all(), $statusproject->id);
		if ($vld->passes()) {
			$statusproject->update(\Input::all());
			return json_encode($statusproject);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return json
	 */
	public function destroy($id) {
		$statusproject = StatusProject::find($id);
		if ($statusproject != null) {
			$statusproject->delete();
		}
		return json_encode("success");
	}

}
