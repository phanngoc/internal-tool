<?php namespace App\Http\Controllers;

use App\StatusDevice;
use Illuminate\Http\Request;

class StatusDeviceController extends AdminController {

	/**
	 * Display a  list status device
	 *
	 * @return Response
	 */
	public function index() {
	
		if (\Request::ajax()) {
			$statusdevices = StatusDevice::all();
			return json_encode($statusdevices);
		}
		return view('statusdevices.index');
	}



	/**
	 * Store a newly status
	 *
	 * @return string
	 */
	public function store() {
		$vld = StatusDevice::validate(\Input::all());
		if ($vld->passes()) {
			$statusdevices = new StatusDevice(\Input::all());
			$statusdevices->save();
			return json_encode($statusdevices);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

/**
	 * update status
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function update($id) {
		$statusdevices = StatusDevice::find($id);
		$vld = StatusDevice::validate(\Input::all(), $statusdevices->id);
		if ($vld->passes()) {
			$statusdevices->update(\Input::all());
			return json_encode($statusdevices);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

/**
	 * Remove status
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function destroy($id) {
		$statusdevices = StatusDevice::find($id);
		if ($statusdevices != null) {
			$statusdevices->delete();
		}

		return json_encode("success");
	}

}
