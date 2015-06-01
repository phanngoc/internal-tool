<?php namespace App\Http\Controllers;

use App\Feature;
use App\FeatureNode;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddModuleRequest;
use App\Http\Requests\EditModuleRequest;
use App\Module;

class ModuleController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	protected $module;

	function __construct(Module $module) {
		$this->module = $module;
	}

	public function index() {
		$modules = $this->module->all();
		return view('modules.listmodule', compact('modules'));
	}

	/**
	 * Show tree , use send data from client ajax
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function showTree($id) {

		#$items = FeatureNode::hasChildren()->get();
		$features = Feature::where('module_id', '=', $id)->where('parent_id', '=', 0)->get();
		if (count($features) == 0) {
			echo "";
		} else {
			echo "<table class='tree table'>";
			foreach ($features as $k_fea => $val_fea) {
				echo "<tr class='treegrid-" . $val_fea->id . "'><td>" . $val_fea->name_feature . "</td></tr>";
				$items = FeatureNode::descendantsOf($val_fea->id);
				$items->linkNodes();
				$items = $items->toTree();
				echo $this->echoRecurTreeView($items);
			}
			echo "</table>";
		}

	}

	public function echoRecurTreeView($items) {
		if (count($items) == 0) {
			return "";
		}

		foreach ($items as $key => $value) {

			echo "<tr class='treegrid-" . $value->id;
			if ($value->parent != null) {
				echo " treegrid-parent-" . $value->parent->id . "'>";
			} else {
				echo "'>";
			}
			echo "<td>" . $value->name_feature . "</td>";
			echo "</tr>";
			if (count($value->children) != 0) {
				$this->echoRecurTreeView($value->children);
			}
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('modules.addmodule');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddModuleRequest $request) {
		$module = new Module();
		$module->name = $request['name'];
		$module->description = $request['description'];
		$module->version = $request['version'];

		$module->save();
		return redirect()->route('modules.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$modules = Module::Find($id);
		return view('modules.editmodule', compact('modules'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditModuleRequest $request) {
		$modules = Module::find($id);
		$name = $request->input('name');
		$description = $request->input('description');
		$version = $request->input('version');
		$modules->update([
			'name' => $name,
			'description' => $description,
			'version' => $version,
		]);

		return redirect()->route('modules.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$modules = Module::find($id);
		$modules->feature()->delete();
		$modules->delete('');
		return redirect()->route('modules.index');
	}

}
