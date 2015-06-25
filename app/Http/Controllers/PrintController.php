<?php namespace App\Http\Controllers;

use App\CategorySkill;
use App\Education;
use App\Employee;
use App\EmployeeSkill;
use App\Nationality;
use App\Position;
use App\TakenProject;
use App\WorkingExperience;

class PrintController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

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

		$positions = Position::all();
		$employee = Employee::find($id);

		$educations = Education::where('employee_id', '=', $employee->id)->get();

		$employee_skills = EmployeeSkill::where('employee_id', '=', $employee->id)->get();
		$experiences = WorkingExperience::where('employee_id', '=', $employee->id)->get();
		$taken_projects = TakenProject::where('employee_id', '=', $employee->id)->get();

		$nationalities = Nationality::all();
		$category_skill = CategorySkill::all();

		$parameterr = array();
		$parameter['employee'] = $employee;
		$parameter['educations'] = $educations;
		$parameter['category_skill'] = $category_skill;
		$parameter['employee_skills'] = $employee_skills;
		$parameter['taken_projects'] = $taken_projects;
		$parameter['experiences'] = $experiences;
		$parameter['nationalities'] = $nationalities	;

		$pdf = \PDF::loadView('welcome', $parameter)->setPaper('a4')->setOrientation('landscape')->setWarnings(false);
		return $pdf->download('cv.pdf');

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
