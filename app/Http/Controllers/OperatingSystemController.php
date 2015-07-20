<?php namespace App\Http\Controllers;

use App\OperatingSystem;
use Illuminate\Http\Request;

class OperatingSystemController extends AdminController {

	/**
	 * Display a list operating system.
	 *
	 * @return Response or string
	 */
	public function index() {
		if (\Request::ajax()) {
			$operatingsystems = OperatingSystem::all();
			return json_encode($operatingsystems);
		}
		return view('operatingsystems.index');
	}

	/**
	 * Store a newly created operating system in storage.
	 *
	 * @return string
	 */
	public function store() {
		$vld = OperatingSystem::validate(\Input::all());
		if ($vld->passes()) {
			$operatingsystems = new OperatingSystem(\Input::all());
			$operatingsystems->save();
			return json_encode($operatingsystems);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Update the specified operating system in storage.
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function update($id) {
		$operatingsystems = OperatingSystem::find($id);
		$vld = OperatingSystem::validate(\Input::all(), $operatingsystems->id);
		if ($vld->passes()) {
			$operatingsystems->update(\Input::all());
			return json_encode($operatingsystems);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Remove the specified operating system from storage.
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function destroy($id) {
		$operatingsystems = OperatingSystem::find($id);
		if ($operatingsystems != null) {
			$operatingsystems->delete();
		}

		return json_encode("success");
	}

}
