<?php

namespace App\Http\Controllers;

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
use DateTime;
use Excel;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Input;
use Validator;
use App\Http\Requests\AddEmployeeRequest;
use Requests;

class EmployeeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$employees = Employee::all();
		foreach ($employees as $key => $value) {
			//var_dump(Position::find($value->position_id)->name);
			$employees[$key]->position_name = Position::find($value->position_id)->name;
		}
		return view('employee.listemployee', compact('employees'));
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

	public function editmore($id) {
		$positions = Position::all();
		$employee = Employee::find($id);

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

		return View('employee.editmore', compact('positions', 'employee', 'experiences', 'nationalities', 'educations', 'employee_skills', 'skill', 'taken_projects'));
	}

	public function editmorestore($id, AddEditEmployeeRequest $request) {
		$positions = Position::all();
		$employee = Employee::find($id);

		$img = $request->imageup;
		$requestdata = $request->all();
		$requestdata['dateofbirth'] = $this->convert_datepicker_to_datetimesql(Request::input('dateofbirth'));

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
				'education' => $education,
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
		foreach ($experience as $key => $value) {
			if ($value <= 0) {
				unset($experience[$key]);
				unset($skill[$key]);
			}
		}
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
		return redirect()->route('employee.editmore', $id);
	}

	public function create() {
		$position = Position::all();
		$positions = array();
		foreach ($position as $key => $value) {
			$positions += array($value->id => $value->name);
		}
		return view('employee.addemployee', compact('positions'));
	}

	public function store()
	{
		$user = new Employee(Request::all());
		$user->save();
		return redirect()->route('employee.index')->with('messageOk', 'Add employee successfully!');
	}


	/*EXPORT LIST EMPLOYEE TO EXCEL*/
	public function exportExcel() {
		Excel::create('List Employee', function ($excel) {
			$excel->sheet('Sheetname', function ($sheet) {
				//$sheet->mergeCells('A1:C1');
				$sheet->setBorder('A1:K1', 'thin');

				$sheet->cells('A1:K1', function ($cells) {
					$cells->setBackground('blue');
					$cells->setFontColor('#FFFFFF');
					$cells->setAlignment('center');
					$cells->setValignment('middle');
				});
				$sheet->setWidth(array(
					'A' => '10',
					'B' => '20',
					'C' => '20',
					'D' => '20',
					'E' => '20',
					'F' => '20',
					'G' => '40',
					'H' => '20',
					'I' => '30',
					'J' => '20',
					'K' => '20',
				)
				);

				$data = [];

				/*HEADER EXCEL*/
				array_push($data, array('STT', 'CODE', 'FIRST NAME', 'LAST NAME', 'PHONE', 'POSITION', 'EMAIL', 'NATIONALITY', 'ADDRESS', 'GENDER', 'DATE OF BIRTH'));

				/*CONTENT EXCEL*/
				$employee = Employee::all();
				$number = 0;
				foreach ($employee as $key => $value) {
					$number++;
					array_push($data, array(
						$number,
						$value->employee_code,
						$value->firstname,
						$value->lastname,
						$value->phone,
						$value->positions->name,
						$value->email,
						$value->nationalitys->name,
						$value->address,
						$value->gender == '0' ? 'Female' : 'Male',
						date_format(new DateTime($value->date_of_birth), "d/m/Y"),
					));
				}

				$sheet->fromArray($data, null, 'A1', false, false);
			});
		})->download('xlsx');
	}
}
