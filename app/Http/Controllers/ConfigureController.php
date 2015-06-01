<?php namespace App\Http\Controllers;
use App\Configure;
use App\Language;
use Illuminate\Http\Request;

class ConfigureController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$configures = Configure::all();
		/*if ($configures->name == "default_language") {
		$languages = Language::all();
		return view('configures.configure', compact('configures', 'languages'));
		}*/
		//return view('configures.listconfigure', compact('configures'));
		$languages = Language::all();
		//\Config::persist('app.system_name', 'abcd');
		return view('configures.configure', compact('configures'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$configures = Configure::Find($id);
		if ($configures->name == "default_language") {
			$languages = Language::all();
			return view('configures.editconfigure', compact('configures', 'languages'));
		}
		return view('configures.editconfigure', compact('configures'));
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
	/*public function update($id, EditConfigureRequest $request) {
	$configures = Configure::Find($id);
	$configures->value = $request['value'];
	$configures->description = $request['description'];
	if ($configures->name == "default_language") {
	$language = Language::where('code', '=', $request['value'])->first();
	if (count($language) > 0) {
	$configures->value = $language->language_name;
	Language::where('is_default', '=', 1)->update([
	'is_default' => 0]);
	$language->is_default = 1;
	$language->update();
	}
	}
	$configures->update();
	if (Request::ajax()) {
	return "success";
	}
	return redirect()->route('configures.index');
	}*/
	public function update(Request $rq) {
		$names = $rq['name'];
		$values = $rq['value'];
		$index = 0;
		foreach ($names as $name) {
			//$configure=Configure::find();
			$configure = Configure::where('name', '=', $name)->first();
			if ($configure != null) {
				$configure->update([
					'value' => $values[$index++],
				]);
			} else {
				$configure = new Configure();
				$configure->name = $name;
				$configure->value = $values[$index++];
				$configure->save();
			}

			/*->update([
		'value' => $values[$index++],
		]);*/
		}
		return redirect()->route('configures.index');
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
