<?php namespace App\Http\Controllers;

use App\OperatingSystem;
use Illuminate\Http\Request;

class OperatingSystemController extends AdminController {

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
			$operatingsystems = OperatingSystem::all();
			return json_encode($operatingsystems);
		}
		return view('operatingsystems.index');
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
		$vld = OperatingSystem::validate(\Input::all());
		if ($vld->passes()) {
			$operatingsystems = new OperatingSystem(\Input::all());
			$operatingsystems->save();
			return json_encode($operatingsystems);
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
		$operatingsystems = OperatingSystem::find($id);
		$vld = OperatingSystem::validate(\Input::all(), $operatingsystems->id);
		if ($vld->passes()) {
			$operatingsystems->update(\Input::all());
			return json_encode($operatingsystems);
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
		$operatingsystems = OperatingSystem::find($id);
		if ($operatingsystems != null) {
			$operatingsystems->delete();
		}

		return json_encode("success");
	}

}
