<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller {

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
			$skills = Skill::all();
			return json_encode($skills);
		}
		return view('categoryskills.index');
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
		$vld = Skill::validate(\Input::all());
		if ($vld->passes()) {
			$skill = new Skill(\Input::all());
			$skill->save();
			return json_encode($skill);
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
		$skill = Skill::find($id);
		$vld = Skill::validate(\Input::all(), $skill->id);
		if ($vld->passes()) {
			$skill->update(\Input::all());
			return json_encode($skill);
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
		$skill = Skill::find($id);
		if ($skill != null) {
			$skill->delete();
		}

		return json_encode("success");
	}

}
