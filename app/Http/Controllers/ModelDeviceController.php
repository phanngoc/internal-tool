<?php namespace App\Http\Controllers;

use App\ModelDevice;
use Illuminate\Http\Request;

class ModelDeviceController extends AdminController {

	/**
	 * Display list model devices.
	 *
	 * @return Response or string
	 */
	public function index() {
		if (\Request::ajax()) {
			$modeldevices = ModelDevice::all();
			return json_encode($modeldevices);
		}
		return view('modeldevices.index');
	}

	/**
	 * Store a newly created model devices in storage.
	 *
	 * @return string
	 */
	public function store() {
		$vld = ModelDevice::validate(\Input::all());
		if ($vld->passes()) {
			$modeldevices = new ModelDevice(\Input::all());
			$modeldevices->save();
			return json_encode($modeldevices);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Update the specified model device in storage.
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function update($id) {
		$modeldevices = ModelDevice::find($id);
		$vld = ModelDevice::validate(\Input::all(), $modeldevices->id);
		if ($vld->passes()) {
			$modeldevices->update(\Input::all());
			return json_encode($modeldevices);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Remove the specified model device from storage.
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function destroy($id) {
		$modeldevices = ModelDevice::find($id);
		if ($modeldevices != null) {
			$modeldevices->delete();
		}

		return json_encode("success");
	}

}
