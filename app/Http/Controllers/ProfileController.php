<?php namespace App\Http\Controllers;

use App;
use App\Education;
use App\Employee;
use App\EmployeeSkill;
use App\Http\Requests\AddEditEmployeeRequest;
use App\Nationality;
use App\Position;
use App\Skill;
use App\TakenProject;
use App\User;
use App\WorkingExperience;
use Auth;
use File;
use Illuminate\Support\Facades\Redirect;
use Request;

class ProfileController extends AdminController {

	/*Direct to user homepage*/
	public function index() {
		/*VIEW INFORMATION NGOC USER*/
		$positions = Position::all();
		$employee = Auth::user()->employee()->get()->first();

		$educations = Education::where('employee_id', '=', $employee->id)->get();

		$employee->date_of_birth = $this->convert_datetimesql_to_datepicker($employee->date_of_birth);

		$nationalities = Nationality::all();

		/*VIEW INFORMATION WORKING EXPERIENCE - VU*/
		$skill = array("-1" => "None") + Skill::lists('skill', 'id');
		$employee_skills = EmployeeSkill::where('employee_id', '=', $employee->id)->get();
		//dd(json_encode($employee_skills));
		$experiences = WorkingExperience::where('employee_id', '=', $employee->id)->get();
		foreach ($experiences as $key => $value) {
			$experiences[$key]->year_start = $this->convert_datetimesql_to_datepicker($value->year_start);
			$experiences[$key]->year_end = $this->convert_datetimesql_to_datepicker($value->year_end);
		}
		//$experiences->year_start = $this->convert_datetimesql_to_datepicker($experiences->year_start);

		/*VIEW INFORMATION TAKEN PROJECT - VU*/
		$taken_projects = TakenProject::where('employee_id', '=', $employee->id)->get();

		return View('profiles.profiles', compact('positions', 'employee', 'experiences', 'nationalities', 'educations', 'employee_skills', 'skill', 'taken_projects'));
	}

	/**
	 * @param $date
	 * @return mixed
	 */
	public function convert_datetimesql_to_datepicker($date) {
		$year = substr($date, 0, 4);
		$month = substr($date, 5, 2);
		$day = substr($date, 8, 2);
		$res = $day . "/" . $month . "/" . $year;
		return $res;
	}

	public function convert_datepicker_to_datetimesql($date) {
		$day = substr($date, 0, 2);
		$month = substr($date, 3, 2);
		$year = substr($date, 6, 4);
		$mysqltime = date("Y-m-d H:i:s", strtotime($year . "-" . $month . "-" . $day));
		return $mysqltime;
	}

	/*Process add user to database*/
	public function store(AddEditEmployeeRequest $request) {

		$positions = Position::all();
		$employee = Auth::user()->employee()->get()->first();
		$img = $request->imageup;
		$requestdata = $request->all();
		$requestdata['date_of_birth'] = $this->convert_datepicker_to_datetimesql(Request::input('dateofbirth'));

		if ($img != "") {
			$requestdata['avatar'] = 'avatar/' . $requestdata['avatar'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = public_path() . "/avatar/" . $request->avatar;
			$bytes_written = File::put($file, $data);
		}
		$employee->update($requestdata);

		$educations = Education::where('employee_id', '=', $employee->id)->get();

		$employee->date_of_birth = $this->convert_datepicker_to_datetimesql($employee->date_of_birth);

		foreach ($educations as $k_edu => $k_val) {
			$yearstart = Request::input($k_val->id . 'edu_yearstart');
			if ($yearstart == null) {
				Education::destroy($k_val->id);
				continue;
			}
			$yearend = Request::input($k_val->id . 'edu_yearend');
			$education = Request::input($k_val->id . 'edu_education');
			$edu = Education::find($k_val->id);
			$edu->update([
				'year_start' => $yearstart,
				'year_end' => $yearend,
				'edu_education' => $education,
			]);
		}

		$yearstart_new = Request::input('edu_yearstart');
		$yearend_new = Request::input('edu_yearend');
		$education_new = Request::input('edu_education');
		if ($yearstart_new != null) {
			foreach ($yearstart_new as $k_n => $v_n) {
				$user = Education::create(array(
					'employee_id' => $employee->id,
					'year_start' => $yearstart_new[$k_n],
					'year_end' => $yearend_new[$k_n],
					'education' => $education_new[$k_n],
				));
			}
		}
		$educations = Education::where('employee_id', '=', $employee->id)->get();
		$nationalities = Nationality::all();

		/*STORE WORKING EXPERIENCE*/
		$working_experience = WorkingExperience::where('employee_id', '=', $employee->id)->delete();

		//$requestdata['startdate'] = $this->convert_datepicker_to_datetimesql(Request::input('startdate'));

		$company = Request::input('company');
		$startdate = Request::input('startdate');
		$enddate = Request::input('enddate');
		$position = Request::input('position');
		$mainduties = Request::input('mainduties');

		foreach ($startdate as $key => $value) {
			$startdate[$key] = $this->convert_datepicker_to_datetimesql($value);
		}

		foreach ($enddate as $key => $value) {
			$enddate[$key] = $this->convert_datepicker_to_datetimesql($value);
		}

		foreach ($company as $key => $value) {
			$companys = WorkingExperience::create(array(
				'employee_id' => $employee->id,
				'company' => $value,
				'year_start' => $startdate[$key],
				'year_end' => $enddate[$key],
				'position' => $position[$key],
				'main_duties' => $mainduties[$key],
			));
		}

		$taken_project = TakenProject::where('employee_id', '=', $employee->id)->delete();
		$projectname = Request::input('projectname');
		$customername = Request::input('customername');
		$role = Request::input('role');
		$numberpeople = Request::input('numberpeople');
		//dd($numberpeople);
		$projectdescription = Request::input('projectdescription');
		$projectperiod = Request::input('projectperiod');
		$skillset = Request::input('skillset');
		//dd($projectname);
		foreach ($projectname as $key => $value) {
			//dd($numberpeople[$key]);
			$projects = TakenProject::create(array(
				'employee_id' => $employee->id,
				'project_name' => $value,
				'customer_name' => $customername[$key],
				'number_people' => (int) $numberpeople[$key],
				'role' => $role[$key],
				'project_description' => $projectdescription[$key],
				'project_period' => $projectperiod[$key],
				'skill_set_ultilized' => $skillset[$key],
			));
		}

		/*STORE SKILLS*/
		$skill = array();
		$experience = array();
		$skill = Request::input('skill');
		$experience = Request::input('month_experience');
		EmployeeSkill::where("employee_id", "=", $employee->id)->delete();
		/*foreach ($experience as $key => $value) {
		if ($value <= 0) {
		unset($experience[$key]);
		unset($skill[$key]);
		}
		}*/
		foreach ($skill as $key => $value) {
			if ($value < 0) {
				unset($experience[$key]);
				unset($skill[$key]);
			} else {
				$employeeskill = EmployeeSkill::create(array(
					"employee_id" => $employee->id,
					"skill_id" => $value,
					"month_experience" => $experience[$key]));
			}
		}
		return redirect()->route('profiles.index');
		//return View('profiles.profiles', compact('positions', 'employee', 'educations', 'nationalities', 'experiences'));
	}

	/*Direct to add user page*/
	public function create() {

	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update() {

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy() {

	}

}
