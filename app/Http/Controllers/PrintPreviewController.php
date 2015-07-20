<?php namespace App\Http\Controllers;

use App\CategorySkill;
use App\Education;
use App\Employee;
use App\EmployeeSkill;
use App\Nationality;
use App\Position;
use App\TakenProject;
use App\WorkingExperience;

//use App\CategorySkill;

class PrintPreviewController extends AdminController {

	
	public function index() {


	}


	public function create() {
		//
	}

	
	public function store() {
		//
	}

	/**
	 * Show  Cv information
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

		return view('printpreview.printpreview', compact('taken_projects', 'position', 'employee_skills', 'nationalities', 'employee', 'educations', 'experiences', 'category_skill'));

	}

	
	public function edit($id) {
		//
	}

	
	public function update($id) {
		//
	}

	
	public function destroy($id) {
		//
	}

}
