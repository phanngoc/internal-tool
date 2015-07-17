<?php namespace App\Http\Controllers;

use App\CategorySkill;
use Illuminate\Http\Request;

class CategorySkillController extends AdminController {

	/**
	 * Display list category skills
	 *
	 * @return Response
	 */
	public function index() {
		if (\Request::ajax()) {
			$cskills = CategorySkill::orderBy('id', 'DESC')->get();
			return json_encode($cskills);
		}
		return view('categoryskills.index');
	}

	/**
	 * Get list category skills
	 * @return string
	 */
	public function categorys() {
		return json_encode(CategorySkill::all());
	}

	/**
	 * Store a newly category skill
	 *
	 * @return string
	 */
	public function store() {
		$vld = CategorySkill::validate(\Input::all());
		if ($vld->passes()) {
			$cskill = new CategorySkill(\Input::all());
			$cskill->save();
			return json_encode($cskill);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Update category skill
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function update($id) {
		$cskill = CategorySkill::find($id);
		$vld    = CategorySkill::validate(\Input::all(), $id);
		if ($vld->passes()) {
			$cskill->update(\Input::all());
			return json_encode($cskill);
		}
		return json_encode(array("Error" => $vld->messages()));
	}

	/**
	 * Remove category skill
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function destroy($id) {
		$cskill = CategorySkill::find($id);
		if ($cskill != null) {
			$cskill->delete();
		}
		return json_encode("success");
	}
}
