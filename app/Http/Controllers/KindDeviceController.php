<?php namespace App\Http\Controllers;

use App\KindDevice;
use Illuminate\Http\Request;

class KindDeviceController extends AdminController {

	/**
	 * Display a listing of the kind device.
	 *
	 * @return Response
	 */
	public function index() {
		if (\Request::ajax()) {
			$kinddevices = KindDevice::all();
			return json_encode($kinddevices);
		}
		return view('kinddevices.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$vld = KindDevice::validate(\Input::all());
		if ($vld->passes()) {
			$kinddevices = new KindDevice(\Input::all());
			$kinddevices->save();
			return json_encode($kinddevices);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Update the specified kind device in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
		$kinddevices = KindDevice::find($id);
		$vld = KindDevice::validate(\Input::all(), $kinddevices->id);
		if ($vld->passes()) {
			$kinddevices->update(\Input::all());
			return json_encode($kinddevices);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Remove the specified device from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$kinddevices = KindDevice::find($id);
		if ($kinddevices != null) {
			$kinddevices->delete();
		}

		return json_encode("success");
	}

}
