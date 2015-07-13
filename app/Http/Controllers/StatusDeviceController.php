<?php namespace App\Http\Controllers;

use App\StatusDevice;
use Illuminate\Http\Request;

class StatusDeviceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		/*$routeCollection = \Route::getRoutes();
		foreach ($routeCollection as $value) {
		echo $value->getPath();
		echo "<hr>";
		}
		$cSkills = CategorySkill::lists("category_name", "id");
		return view('skills.index', compact('cSkills'));*/
		if (\Request::ajax()) {
			$statusdevices = StatusDevice::all();
			return json_encode($statusdevices);
		}
		return view('statusdevices.index');
	}

	/*public function getSkills() {
	if (\Request::ajax()) {
	$skills = Skill::all();
	return json_encode($skills);
	}
	return view('skills.index');
	}
	public function getListSkill($category_id) {
	$skills = Skill::where('category_id', '=', $category_id)->lists("skill", "id");
	return json_encode($skills);
	}*/

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
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
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$statusdevices = StatusDevice::find($id);
		if ($statusdevices != null) {
			$statusdevices->delete();
		}

		return json_encode("success");
	}

}
