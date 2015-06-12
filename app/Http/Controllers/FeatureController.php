<?php

namespace App\Http\Controllers;

use App\Feature;
use App\FeatureNode;
use App\Http\Requests\AddFeatureRequest;
use App\Module;
use Illuminate\Http\Request;

class FeatureController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$features = Feature::all();
		$number = 0;
		return View('features.listfeature', compact('features'))->with('number', $number);
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

		$feature = new FeatureNode();
		$feature->module_id = $request['id_module'];
		$feature->name_feature = $request['name_feature'];
		$feature->description = $request['description'];
		$feature->url_action = $request['action'];
		$feature->parent_id = $request['id_parent'];
		$feature->is_menu = $request['is_menu'];

		$data = array();
		$data['module_id'] = $request['id_module'];
		$data['name_feature'] = $request['name_feature'];
		$data['description'] = $request['description'];
		$data['url_action'] = $request['action'];
		$data['parent_id'] = $request['id_parent'];
		$data['is_menu'] = $request['is_menu'];
		$feature = null;
		if ($request['id_parent'] != 0) {
			$nodeparent = FeatureNode::find($request['id_parent']);
			$feature = FeatureNode::create($data, $nodeparent);
		} else {
			$feature = FeatureNode::create($data);
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
		$feature = Feature::find($id);
		$features = Feature::all();
		$modules = Module::all();
		//dd(json_encode($feature));
		if (is_null($feature)) {
			return redirect()->route('features.listfeature');
		}

		return View('features.editfeature', compact('feature', 'features', 'modules'));
	}

	public function postFeature() {
		$id = isset($_GET['id']) ? (int) $_GET['id'] : false;
		$features = Feature::where('module_id', '=', $id)->get();
		$data = array();
		foreach ($features as $key => $value) {
			$item = array("id" => $value->id, "name" => $value->name_feature);
			array_push($data, $item);
		}
		echo json_encode($data);
		//return View('features.addfeature', compact('feature'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {
		$is_menu = $request['is_menu'];
		if ($is_menu == null) {
			$is_menu = "0";
		}

		$feature = Feature::find($id);
		$feature->update([
			'name_feature' => $request['feature_name'],
			'description' => $request['description'],
			'url_action' => $request['action'],
			'parent_id' => $request['parent_id'],
			'module_id' => $request['module_id'],
			'is_menu' => $request['is_menu'],
		]);
		$nodenew = FeatureNode::find($id);
		if ($request['parent_id'] != 0) {
			$nodeparent = FeatureNode::find($request['parent_id']);
			$nodenew->appendTo($nodeparent)->save();
		} else {
			$nodenew->saveAsRoot();
		}
		return redirect()->route('features.index')->with('messageOk', 'user update successfully');
	}

	public function test() {
		$items = FeatureNode::hasChildren()->get();
		$items->linkNodes();
		dd($items);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$feature = Feature::find($id);
		$feature->group()->detach();
		$feature->delete();
		return redirect()->route('features.index');
	}

}
