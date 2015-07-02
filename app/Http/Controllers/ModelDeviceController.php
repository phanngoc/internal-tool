<?php namespace App\Http\Controllers;

use App\ModelDevice;
use Illuminate\Http\Request;

class ModelDeviceController extends AdminController {

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
			$modeldevices = ModelDevice::all();
			return json_encode($modeldevices);
		}
		return view('modeldevices.index');
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
		$vld = ModelDevice::validate(\Input::all());
		if ($vld->passes()) {
			$modeldevices = new ModelDevice(\Input::all());
			$modeldevices->save();
			return json_encode($modeldevices);
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
		$modeldevices = ModelDevice::find($id);
		$vld = ModelDevice::validate(\Input::all(), $modeldevices->id);
		if ($vld->passes()) {
			$modeldevices->update(\Input::all());
			return json_encode($modeldevices);
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
		$modeldevices = ModelDevice::find($id);
		if ($modeldevices != null) {
			$modeldevices->delete();
		}

		return json_encode("success");
	}

}
