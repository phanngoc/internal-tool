<?php namespace App\Http\Controllers;

use App\KindDevice;
use Illuminate\Http\Request;

class KindDeviceController extends AdminController {

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
			$kinddevices = KindDevice::all();
			return json_encode($kinddevices);
		}
		return view('kinddevices.index');
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
		$vld = KindDevice::validate(\Input::all());
		if ($vld->passes()) {
			$kinddevices = new KindDevice(\Input::all());
			$kinddevices->save();
			return json_encode($kinddevices);
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
		$kinddevices = KindDevice::find($id);
		$vld = KindDevice::validate(\Input::all(), $kinddevices->id);
		if ($vld->passes()) {
			$kinddevices->update(\Input::all());
			return json_encode($kinddevices);
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
		$kinddevices = KindDevice::find($id);
		if ($kinddevices != null) {
			$kinddevices->delete();
		}

		return json_encode("success");
	}

}
