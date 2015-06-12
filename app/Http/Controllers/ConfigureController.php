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
		$configures = Configure::lists('value', 'name');
		$languages = Language::lists('language_name', 'code');
		return view('configures.configure', compact('configures', 'languages'));
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
	public function update(Request $request) {
		$name = $request->get('name');
		$value = $request->get('value');
		//dd($value);
		$lan = 0;
		foreach ($name as $key) {
			Configure::where('name', '=', $key)->update([
				'value' => $value[$lan],
			]);
			if ($key == "default_language") {
				Language::where('is_default', '=', 1)->update([
					'is_default' => 0,
				]);
				$language = Language::where('code', '=', $value[$lan])->update([
					'is_default' => 1,
				]);
			}
			$lan++;
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
