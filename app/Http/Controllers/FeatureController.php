<?php

namespace App\Http\Controllers;

use App\Feature;
use App\Http\Requests\AddFeatureRequest;
use App\Module;

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
		$routeCollection = \Route::getRoutes();
		$routes = array();
		$routes += array("#" => "#");
		foreach ($routeCollection as $value) {
			if ($value->getName() != null) {
				$routes += array($value->getName() => $value->getName());
			}

		}
		$feature = Feature::where("module_id", "=", $module->first()->id)->get();

		return view('features.addfeature', compact('module', 'feature', 'routes'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddFeatureRequest $request) {
		$is_menu = $request['is_menu'];
		if ($is_menu == null) {
			$is_menu = "0";
		}
		$ac_menus = $request['action'];
		$menu = "";
		if (count($ac_menus) > 1) {
			foreach ($ac_menus as $key => $value) {
				if ($key == 0) {
					$menu = '"' . $value . '"';
				} else {
					$menu .= ',"' . $value . '"';
				}

			}
			$menu = "[" . $menu . "]";
		} else {
			$menu = $ac_menus[0];
		}
		/*$data = array();
		$data['module_id'] = $request['module_id'];
		$data['name_feature'] = $request['name_feature'];
		$data['description'] = $request['description'];
		$data['url_action'] = $menu;
		$data['parent_id'] = $request['parent_id'];
		$data['is_menu'] = $is_menu;*/
		$request['url_action'] = $menu;
		$feature = null;
		if ($request['parent_id'] != 0) {
			$nodeparent = Feature::find($request['parent_id']);
			$feature = Feature::create($request->all(), $nodeparent);
		} else {
			$feature = Feature::create($request->all());
		}
		return redirect()->route('features.index')->with('messageOk', 'Add feature successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		/*$node = Feature::find($id);
		dd(json_encode($node->getSiblings()));*/
		$feature = Feature::find($id);
		$features = Feature::where('module_id', '=', $feature->module_id)->get();
		$modules = Module::all();
		$routeCollection = \Route::getRoutes();
		$routes = array();
		$jsroute = json_decode($feature->url_action);
		$routeselect = array();
		$routes += array("#" => "#");
		if ($jsroute != NULL) {
			foreach ($jsroute as $route) {
				$routeselect += array($route => $route);
			}
		} else {
			$routeselect = array($feature->url_action => $feature->url_action);
			//array_push($allowed_routes, $val_fea->url_action);
		}
		foreach ($routeCollection as $value) {
			if ($value->getName() != null) {
				$routes += array($value->getName() => $value->getName());
			}

		}
		if (is_null($feature)) {
			return redirect()->route('features.listfeature');
		}

		return View('features.editfeature', compact('feature', 'features', 'modules', 'routes', 'routeselect'));
	}
	/**
	 * [postFeature description]
	 * @return [type] [description]
	 */
	public function postFeature() {
		$id = isset($_GET['id']) ? (int) $_GET['id'] : false;
		$id_feature = isset($_GET['id_feature']) ? (int) $_GET['id_feature'] : false;
		$features = Feature::where('module_id', '=', $id)->get();
		$data = array();
		foreach ($features as $key => $value) {
			if ($value->id == $id_feature) {
				continue;
			}

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
	public function update($id, AddFeatureRequest $request) {
		$is_menu = $request['is_menu'];
		if ($is_menu == null) {
			$is_menu = "0";
		}
		$ac_menus = $request['action'];
		$menu = "";
		if (count($ac_menus) > 1) {
			foreach ($ac_menus as $key => $value) {

				if ($key == 0) {
					$menu = '"' . $value . '"';
				} else {
					$menu .= ',"' . $value . '"';
				}

			}
			$menu = "[" . $menu . "]";
		} else {
			$menu = $ac_menus[0];
		}
		$feature = Feature::find($id);
		$feature->update([
			'name_feature' => $request['name_feature'],
			'description' => $request['description'],
			'url_action' => $menu,
			'parent_id' => $request['parent_id'],
			'module_id' => $request['module_id'],
			'is_menu' => $request['is_menu'],
		]);
		//$nodenew = Feature::find($id);
		//$nodenew->down(1);
		if ($request['parent_id'] != 0) {
			$nodeparent = Feature::find($request['parent_id']);
			$feature->appendTo($nodeparent)->save();
		} else {
			$feature->saveAsRoot();
		}
		return redirect()->route('features.index')->with('messageOk', 'Update feature successfully');
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
		return redirect()->route('features.index')->with('messageDelete', 'Delete feature success!');
	}

}
