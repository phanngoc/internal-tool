<?php namespace App\Http\Controllers;

use App\Skill;
use Illuminate\Http\Request;

class SkillController extends AdminController {

	/**
	 * Display list skill
	 *
	 * @return Response
	 */
	public function index() {
		if (\Request::ajax()) {
			$skills = Skill::orderBy('id', 'DESC')->get();
			return json_encode($skills);
		}
		return view('categoryskills.index');
	}


	/**
	 * Store a newly skill
	 *
	 * @param  int  $id
	 * @return string
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
	 * Update skill
	 *
	 * @param  int  $id
	 * @return string
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
	 * Remove skill
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function destroy($id) {
		$skill = Skill::find($id);
		if ($skill != null) {
			$skill->delete();
		}

		return json_encode("success");
	}

}
