<?php namespace App\Http\Controllers;

use App\Feature;
use App\FeatureNode;
use App\Http\Requests\AddModuleRequest;
use App\Http\Requests\EditModuleRequest;
use App\Module;

class ModuleController extends AdminController {

	protected $module;

	function __construct(Module $module) {
		parent::__construct();
		$this->module = $module;
	}
	/**
	 * Display list module.
	 *
	 * @return Response
	 */
	public function index() {
		$modules = $this->module->orderBy('id', 'ASC')->get();
		$number = 0;
		return view('modules.listmodule', compact('modules'))->with('number', $number);
	}

	/**
	 * Show tree , use send data from client ajax
	 * @param  [int] $id
	 * @return void
	 */
	public function showTree($id) {
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
	/**
	 * Show true feature module
	 * @param  [array] $items
	 * @return void
	 */
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
			echo "</tr>";
			if (count($value->children) != 0) {
				$this->echoRecurTreeView($value->children);
			}
			echo "</ul>";
		}
	}

	/**
	 * Show the form for creating a new module.
	 *
	 * @return Response
	 */
	public function create() {
		$maxorder = $this->module->count();
		return view('modules.addmodule', compact('maxorder'));
	}

	/**
	 * Update order of module
	 * @param  [int]  $start [description]
	 * @param  [int]  $end   [description]
	 * @param  boolean $up    [description]
	 * @return void
	 */
	public function updateOrder($start, $end, $up = true) {
		if ($start = $end) {
			return;
		}
		if ($start > $end) {
			$new = $start;
			$start = $end;
			$end = $new;
			$up = false;
		}
		$modules = $this->module->orderBy('order', 'ASC')->where('order', '>=', $start)->where('order', '<=', $end)->get();
		foreach ($modules as $key => $value) {
			if ($up) //old>new
			{
				$this->module->find($value->id)->update(['order' => $start + $key + 1]);
			} else {
				$this->module->find($value->id)->update(['order' => $start + $key - 1]);
			}

		}
	}

	/**
	 * Store a newly created module in storage.
	 * @param  AddModuleRequest $request
	 * @return Response
	 */
	public function store(AddModuleRequest $request) {
		$this->updateOrder($request->order, $this->module->count() + 1);

		$this->module->create($request->all());
		return redirect()->route('modules.index')->with('messageOk', 'Add module successfully!')->withInput();
	}
	
	/**
	 * Show the form for editing the specified module.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$modules = $this->module->Find($id);
		$maxorder = $this->module->count();
		return view('modules.editmodule', compact('modules', 'maxorder'));
	}

	/**
	 * Update the specified module in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditModuleRequest $request) {
		$vld = $this->module->validate($request->all(), $id);
		if (!$vld->passes()) {
			return \Redirect::back()->withErrors($vld->messages());
		}
		$modules = $this->module->find($id);
		$this->updateOrder($request->order, $modules->order);
		$modules->update($request->all());
		return redirect()->route('modules.index')->with('messageOk', 'Update module successfully!');
	}

	/**
	 * Remove the specified module from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$modules = $this->module->find($id);
		$this->updateOrder($this->module->count() + 1, $modules->order);
		$modules->feature()->delete();
		$modules->delete('');
		return redirect()->route('modules.index')->with('messageDelete', 'Delete module successfully!');
	}

}
