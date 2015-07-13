<?php namespace App\Http\Controllers;

use App\TypeDevice;
use App\ModelDevice;
use Illuminate\Http\Request;

class TypeDeviceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		if (\Request::ajax()) {
			$typedevices = TypeDevice::all();
			return json_encode($typedevices);
		}
		if (\Request::ajax()) {
			$modeldevices = ModelDevice::all();
			return json_encode($modeldevices);
		}
		return view('typedevices.index');
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

		$vld = TypeDevice::validate(\Input::all());
		if ($vld->passes()) {
			$typedevices = TypeDevice::Create(\Input::all());
			return json_encode($typedevices);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		//
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
	public function update($id) {
		$typedevices = TypeDevice::find($id);
		if ($typedevices != null) {
			$vld = TypeDevice::validate(\Input::all(), $id);
			if ($vld->passes()) {
				$typedevices->update(\Input::all());
				return json_encode($typedevices);
			}
			return json_encode(array("Error" => $vld->messages()));
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$typedevices = TypeDevice::find($id);
		if ($typedevices != null) {
			$typedevices->delete();
		}

		return json_encode("success");
	}

}
