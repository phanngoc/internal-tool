<?php

namespace App\Http\Controllers;

use App;
use App\Education;
use App\Employee;
use App\EmployeeSkill;
use App\Http\Requests\AddEditEmployeeRequest;
use App\Http\Requests\AddEmployeeRequest;
use App\Nationality;
use App\Position;
use App\Skill;
use App\TakenProject;
use App\User;
use App\WorkingExperience;
use DateTime;
use Excel;
use File;
use Illuminate\Support\Facades\Redirect;
use Input;
use Illuminate\Http\Request;
use Validator;

class EmployeeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(\Illuminate\Http\Request $request) {
		$employees = Employee::orderBy('id', 'desc')->get();

		foreach ($employees as $key => $value) {
			$employees[$key]->position_name = Position::find($value->position_id)->name;
		}

		$positions = Position::all();
		$nationalities = Nationality::all();
        $flagMessage = $request->session()->get('flagMessage', 'false');
		return view('employee.listemployee', compact('employees', 'positions', 'nationalities','flagMessage'));
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
		$requestdata['date_of_birth'] = $this->convert_datepicker_to_datetimesql($request->get('dateofbirth'));
		if ($img != "") {
			$requestdata['avatar'] = 'avatar/' . $requestdata['avatar'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = public_path() . "/avatar/" . $request->avatar;
			$bytes_written = File::put($file, $data);
		} else {
			$requestdata['avatar'] = $requestdata['avatar_save'];
		}

		$employee->update($requestdata);

		$educations = Education::where('employee_id', '=', $employee->id)->get();

		$employee->date_of_birth = $this->convert_datepicker_to_datetimesql($employee->date_of_birth);

		foreach ($educations as $k_edu => $k_val) {
			$yearstart = $request->get('edu_yearstart'.$k_val->id);
			if ($yearstart == null) {
				Education::destroy($k_val->id);
				continue;
			}
			$yearend = $request->get('edu_yearend'.$k_val->id);
			$education = $request->get('edu_education'.$k_val->id);
			$edu = Education::find($k_val->id);
			$edu->update([
				'year_start' => $yearstart,
				'year_end' => $yearend,
				'education' => $education,
			]);
		}

		$yearstart_new = $request->get('edu_yearstart');
		$yearend_new = $request->get('edu_yearend');
		$education_new = $request->get('edu_education');
		if ($yearstart_new != null && $yearstart_new[0] != "") {
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
		$company = $request->get('company');
		$startdate = $request->get('startdate');
		$enddate = $request->get('enddate');
		$position = $request->get('position');
		$mainduties = $request->get('mainduties');
		if (!empty($startdate)) {
			foreach ($startdate as $key => $value) {
				$startdate[$key] = $this->convert_datepicker_to_datetimesql($value);
			}

			foreach ($enddate as $key => $value) {
				$enddate[$key] = $this->convert_datepicker_to_datetimesql($value);
			}
		}
		
		foreach ($company as $key => $value) {
			if ($company[0] != "") {
				$companys = WorkingExperience::create(array(
					'employee_id' => $employee->id,
					'company' => $value,
					'year_start' => $startdate[$key],
					'year_end' => $enddate[$key],
					'position' => $position[$key],
					'main_duties' => $mainduties[$key],
				));
			}
		}

		/*STORE TAKEN PROJECT*/
		$taken_project = TakenProject::where('employee_id', '=', $employee->id)->delete();
		$projectname = $request->get('projectname');
		$customername = $request->get('customername');
		$role = $request->get('role');
		$numberpeople = $request->get('numberpeople');
		$projectdescription = $request->get('projectdescription');
		$projectperiod = $request->get('projectperiod');
		$skillset = $request->get('skillset');
		
		foreach ($projectname as $key => $value) {
			if ($projectname[0] != "") {
				$projects = TakenProject::create(array(
					'employee_id' => $employee->id,
					'project_name' => $value,
					'customer_name' => $customername[$key],
					'number_people' => $numberpeople[$key],
					'role' => $role[$key],
					'project_description' => $projectdescription[$key],
					'project_period' => $projectperiod[$key],
					'skill_set_ultilized' => $skillset[$key],
				));
			}
		}

		/*STORE SKILLS*/
		$skill = array();
		$experience = array();
		$skill = $request->get('skill');
		$experience = $request->get('month_experience');
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
				if ($experience[$key] < 0) {
					$experience[$key] = 0;
				}

				$employeeskill = EmployeeSkill::create(array(
					"employee_id" => $employee->id,
					"skill_id" => $value,
					"month_experience" => $experience[$key]));
			}
		}
        
		$request->session()->flash('flagMessage', 'true');
		return redirect()->route('employee.editmore', $id);
	}

	public function create() {
		$position = Position::all();
		$nationalities = Nationality::all();
		$positions = array();
		foreach ($position as $key => $value) {
			$positions += array($value->id => $value->name);
		}
		return view('employee.addemployee', compact('positions', 'nationalities'));
	}

	public function store(Request $request) {
		$employee = new Employee();

		$v = Validator::make($request->all(), [
			"firstname" => "required|min:2",
			"lastname" => "required|min:2",
			"phone" => "required|min:10|max:11",
			"dateofbirth" => "required",
			'employee_code' => 'required|min:7|unique:employees',
	        'email' => 'required|unique:employees',
	    ]);

	    if ($v->fails()){
		    return redirect()->back()->withErrors($v->errors());
		}

		$date = $request->get('dateofbirth');
		$dates = $this->convert_datepicker_to_datetimesql($date);
		$employee->employee_code = $request->get('employee_code');
		$employee->firstname = $request->get('firstname');
		$employee->lastname = $request->get('lastname');
		$employee->date_of_birth = $dates;
		$employee->email = $request->get('email');
		$employee->gender = $request->get('gender');
		$employee->phone = $request->get('phone');
		$employee->position_id = $request->get('position_id');
		$employee->nationality = $request->get('nationality');
		$employee->save();

		return redirect()->route('employee.index')->with('messageOk', 'Add employee successfully!');
	}

	public function delete($id) {
		$employee = Employee::find($id);
		$a = WorkingExperience::where('employee_id', '=', $employee->id)->delete();
		$b = TakenProject::where('employee_id', '=', $employee->id)->delete();
		$c = EmployeeSkill::where('employee_id', '=', $employee->id)->delete();
		$f = Education::where('employee_id', '=', $employee->id)->delete();
		$g = User::where('employee_id', '=', $employee->id)->delete();
		$employee->delete();

		return redirect()->route('employee.index')->with('messageDelete', 'Delete employee successfully!');
	}

/*public function importExcel() {
$import = (Input::file('file'));
$import_storage = $import->move(__DIR__.'/storage/import/', date('Ymd').'_'.date('His').'_'.str_random(5).'_'.$import->getClientOriginalName());
Excel::load('import_storage', function($reader) {

$reader->each(function($row) {
Employee::create($row->all());
});

});

$reader->each(function ($row) {
Employee::create($row->all());
});

});

return redirect()->route('employee.index');

}*/
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
					$cells->setFontFamily('Times New Roman');
				});
				$sheet->cells('A', function($cells){
					$cells->setAlignment('center');
					$cells->setFontFamily('Times New Roman');
				});
				$sheet->setFontFamily('Times New Roman');
				$sheet->setWidth(array(
					'A' => '10',
					'B' => '15',
					'C' => '20',
					'D' => '10',
					'E' => '30',
					'F' => '20',
					'G' => '30',
					'H' => '20',
					'I' => '40',
					'J' => '15',
					'K' => '15',
				)
				);

				$data = [];

				/*HEADER EXCEL*/
				array_push($data, array('#', 'Employee Code', 'Last Name', 'First Name', 'Email', 'Phone', 'Position', 'Nationality', 'Address', 'Gender', 'Date Of Birth'));

				/*CONTENT EXCEL*/
				$employee = Employee::all();
				$number = 0;
				foreach ($employee as $key => $value) {
					$number++;
					array_push($data, array(
						$number,
						$value->employee_code,
						$value->lastname,
						$value->firstname,
						$value->email,
						$value->phone,
						$value->departments->name,
						$value->nationalitys->name,						
						$value->address,
						$value->gender == '0' ? 'Male' : 'Female',
						date_format(new DateTime($value->date_of_birth), \App\Configure::where('name', '=', 'format_date')->first()->value),
					));
				}
				$sheet->fromArray($data, null, 'A1', false, false);
			});
		})->download('xls');
	}

	/*Employee Filter*/
	public function filter() {
		$positions = Input::get('position');
		$nationalities = Input::get('nationality');
		$genders = Input::get('gender');
		$birthdays = Input::get('birthday');

		/*Thuc hien cau truy van de lay du lieu ra ben ngoai*/
		$query = Employee::where('position_id', 'LIKE', "%$positions")
			->where('nationality', 'LIKE', "%$nationalities%")
			->where('gender', 'LIKE', "%$genders%")
			->where('date_of_birth', 'LIKE', "%$birthdays%")
			->get();

		/*Tra ve view list employee*/
		$results = array();
		foreach ($query as $key => $value) {
			$results[] = $value;
		}

		$employees = $results;

		foreach ($employees as $key => $value) {
			$employees[$key]->position_name = Position::find($value->position_id)->name;
			$employees[$key]->national_name = Nationality::find($value->nationality)->name;
		}

		$positions = Position::all();
		$nationalities = Nationality::all();

		return view('employee.listemployee', compact('employees', 'positions', 'nationalities'));

	}
}
