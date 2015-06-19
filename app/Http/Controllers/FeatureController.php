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
		$feature = new FeatureNode();
		$feature->module_id = $request['id_module'];
		$feature->name_feature = $request['name_feature'];
		$feature->description = $request['description'];
		$feature->url_action = $menu;
		$feature->parent_id = $request['id_parent'];
		$feature->is_menu = $is_menu;

		$data = array();
		$data['module_id'] = $request['id_module'];
		$data['name_feature'] = $request['name_feature'];
		$data['description'] = $request['description'];
		$data['url_action'] = $menu;
		$data['parent_id'] = $request['id_parent'];
		$data['is_menu'] = $is_menu;
		$feature = null;
		if ($request['id_parent'] != 0) {
			$nodeparent = FeatureNode::find($request['id_parent']);
			$feature = FeatureNode::create($data, $nodeparent);
		} else {
			$feature = FeatureNode::create($data);
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
		$nodenew = FeatureNode::find($id);
		if ($request['parent_id'] != 0) {
			$nodeparent = FeatureNode::find($request['parent_id']);
			$nodenew->appendTo($nodeparent)->save();
		} else {
			$nodenew->saveAsRoot();
		}
		return redirect()->route('features.index')->with('messageOk', 'Update feature successfully');
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
		return redirect()->route('features.index')->with('messageDelete', 'Delete feature success!');
	}

}
