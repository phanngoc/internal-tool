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
		/*$routeCollection = \Route::getRoutes();
		foreach ($routeCollection as $value) {
		echo $value->getPath();
		echo "<hr>";
		}
		$cSkills = CategorySkill::lists("category_name", "id");
		return view('skills.index', compact('cSkills'));*/
		if (\Request::ajax()) {
			$informationdevices = InformationDevice::all();
			return json_encode($informationdevices);
		}
		return view('informationdevices.index');
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
			//dd(\Input::all());
		$informationdevices = InformationDevice::find($id);
		$vld = InformationDevice::validate(\Input::all());

		if ($vld->passes()) {
			$informationdevices->update(\Input::all());
			return json_encode($informationdevices);
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
		$informationdevices = InformationDevice::find($id);
		if ($informationdevices != null) {
			$informationdevices->delete();
		}

		return json_encode("success");
	}

}
