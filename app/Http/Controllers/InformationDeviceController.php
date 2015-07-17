<?php namespace App\Http\Controllers;

use App\InformationDevice;
use Illuminate\Http\Request;

class InformationDeviceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		if (\Request::ajax()) {
			$informationdevices = InformationDevice::all();
			return json_encode($informationdevices);
		}
		return view('informationdevices.index');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		$vld = InformationDevice::validate(\Input::all());

		if ($vld->passes()) {
			$informationdevices = new InformationDevice(\Input::all());
			$informationdevices->save();
			return json_encode($informationdevices);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) {
			
		$informationdevices = InformationDevice::find($id);
		$informationdevices->update(\Input::all());
		dd(json_encode($informationdevices));
		return json_encode($informationdevices);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$informationdevices = InformationDevice::find($id);
		if ($informationdevices != null) {
			$informationdevices->delete();
		}
		return json_encode("success");
	}

}
