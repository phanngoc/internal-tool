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
		}*/
		if (\Request::ajax()) {
			$skills = Skill::all();
			return json_encode($skills);
		}
		return view('skills.index');
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
		$vld = Skill::validate(\Input::all());
		if ($vld->passes()) {
			$skill = new Skill(\Input::all());
			$skill->save();
			return json_encode("success");
		}
		return json_encode($vld->messages());
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
		$skill = Skill::find($id);
		$vld = Skill::validate(\Input::all(), $skill->id);
		if ($vld->passes()) {
			$skill->update(\Input::all());
			return "success";
		}
		return json_encode($vld->messages());
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
			$skill->employee()->detach();
			$skill->delete();
		}

		return json_encode("success");
	}

}
