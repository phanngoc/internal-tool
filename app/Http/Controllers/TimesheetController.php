<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use App\Timesheet;

class TimesheetController extends AdminController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return json
	 */
	public function index() {
		$timesheets = Timesheet::all();
		$response = array();
		foreach ($timesheets as $key => $value) {
			$item = array(
							"id"       => $value->id, 
				 			"taskname" => $value->taskname,
                            "start"    => $value->start,
                            "end"      => $value->end,
                            "project"
                         );
			array_push($response, $item);
		}
		echo json_encode($response);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$module = Module::all();
		$feature = Feature::all();
		return view('features.addfeature', compact('module', 'feature'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddFeatureRequest $request) {
		$feature               = new FeatureNode();
		$feature->module_id    = $request['id_module'];
		$feature->name_feature = $request['name_feature'];
		$feature->description  = $request['description'];
		$feature->url_action   = $request['action'];
		$feature->parent_id    = $request['id_parent'];
		$data                  = array();
		$data['module_id']     = $request['id_module'];
		$data['name_feature']  = $request['name_feature'];
		$data['description']   = $request['description'];
		$data['url_action']    = $request['action'];
		$data['parent_id']     = $request['id_parent'];
		$feature               = null;
		if ($request['id_parent'] != 0) {
			$nodeparent = FeatureNode::find($request['id_parent']);
			$feature    = FeatureNode::create($data, $nodeparent);
		} else {
			$feature    = FeatureNode::create($data);
		}
		return redirect()->route('features.index')->with('messageOk', ' Add successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$feature  = Feature::find($id);
		$features = Feature::all();
		$modules  = Module::all();
		if (is_null($feature)) {
			return redirect()->route('features.listfeature');
		}
		return View('features.editfeature', compact('feature', 'features', 'modules'));
	}

	/**
	 * post feature
	 *
	 * @return json
	 */
	public function postFeature() {
		$id       = isset($_GET['id']) ? (int) $_GET['id'] : false;
		$features = Feature::where('module_id', '=', $id)->get();
		$data     = array();
		foreach ($features as $key => $value) {
			$item = array("id" => $value->id, "name" => $value->name_feature);
			array_push($data, $item);
		}
		echo json_encode($data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {

		$feature = Feature::find($id);
		$feature->update([
			'name_feature' => $request['feature_name'],
			'description'  => $request['description'],
			'url_action'   => $request['action'],
			'parent_id'    => $request['parent_id'],
			'module_id'    => $request['module_id'],
		]);
		$feature->attachGroup($request['group_id']);
		$nodenew = FeatureNode::find($id);
		if ($request['parent_id'] != 0) {
			$nodeparent = FeatureNode::find($request['parent_id']);
			$nodenew->appendTo($nodeparent)->save();
		} else {
			$nodenew->saveAsRoot();
		}
		return redirect()->route('features.index')->with('messageOk', 'user update successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$feature = FeatureNode::find($id);
		$feature->delete();
		return redirect()->route('features.index');
	}

}
