<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\Nationality;
use App\Position;
use App\Skill;
use App\TakenProject;
use App\WorkingExperience;
use App\Education;
use App\Employee;
use App\EmployeeSkill;
use App\User;
use Auth;
use App\CategorySkill;

//use App\CategorySkill;


class PrintPreviewController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		//$categoryskill = CategorySkill::find($id);

		//return view('printpreview.printpreview');

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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	

	public function show($id) {

		/*$employee = \App\Employee::find($id);
		$emp_skills = $employee->skills;
		$categoryskill = \App\CategorySkill::all();
		$listcate = array();
		dd(json_encode($emp_skills));
		foreach ($categoryskill as $key => $value) {
			dd(json_encode($value->skill));
			/*if (in_array($value->skill, $emp_skills)) {
		echo "1";
		}*/

		$positions = Position::all();
		$employee = Employee::find($id);

	
		$educations = Education::where('employee_id', '=', $employee->id)->get();
		

		$employee_skills = EmployeeSkill::where('employee_id', '=', $employee->id)->get();
		$experiences = WorkingExperience::where('employee_id', '=', $employee->id)->get();
		$taken_projects = TakenProject::where('employee_id', '=', $employee->id)->get();
		
		
		$nationalities = Nationality::all();
		$category_skill = CategorySkill::all();
	
	
		return view('printpreview.printpreview', compact( 'taken_projects','position','employee_skills', 'nationalities', 'employee', 'educations', 'experiences', 'category_skill'));

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
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
