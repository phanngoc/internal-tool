<?php

namespace App\Http\Controllers;

use App;

use App\Employee;
use Excel;
use App\Http\Requests\AddEditEmployeeRequest;
use App\Http\Requests\AddEmployeeRequest;
use App\Device;
use App\InformationDevice;
use App\KindDevice;
use App\ModelDevice;
use App\OperatingSystem;
use App\TypeDevice;
use App\ReceiveDevice;
use App\StatusDevice;
use File;
use Illuminate\Support\Facades\Redirect;
use Input;
use Request;
use App\Position;

class DeviceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$device = Device::all();
	
		$position = Position::all();
	
		$receive= ReceiveDevice::all();

		
		
			foreach ($device as $key => $value) {
			//var_dump(Position::find($value->position_id)->name);
			$device[$key]->device_name = KindDevice::find($value->kind_device_id)->device_name;
			
			//$device[$key]->employee_code = Employee::find($value->id)->employee_code;
			$device[$key]->status = StatusDevice::find($value->status_id)->status;
			$device[$key]->receive_date = ReceiveDevice::find($value->id)->receive_date;
			
			$device[$key]->distribution = InformationDevice::find($value->information_id)->distribution;

		}
	
		return view('device.listdevice', compact('device','receive','position','employee'));
	}

	/**
	 * @param $date
	 * @return mixed
	 */
	
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
			$img = str_replace(' ', '+',	 $img);
			$data = base64_decode($img);
			$file = public_path() . "/avatar/" . $request->avatar;
			$bytes_written = File::put($file, $data);
		}
		else
		{
			$requestdata['avatar'] = $requestdata['avatar_save'];
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
		if (!empty($startdate)) {
			foreach ($startdate as $key => $value) {
				$startdate[$key] = $this->convert_datepicker_to_datetimesql($value);
			}

			foreach ($enddate as $key => $value) {
				$enddate[$key] = $this->convert_datepicker_to_datetimesql($value);
			}
		}
		if (!empty($company)) {
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
		if (!empty($projectname)) {
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

	public function store(AddEmployeeRequest $request) {
		$user = new Employee($request->all());
		$user->save();
		return redirect()->route('employee.index')->with('messageOk', 'Add employee successfully!');
	}

	public function delete($id) {
		$employee = Employee::find($id);
		
		
		return redirect()->route('employee.index');
		$a = WorkingExperience::where('employee_id', '=', $employee->id)->delete();
		$b = TakenProject::where('employee_id', '=', $employee->id)->delete();
		$c = EmployeeSkill::where('employee_id', '=', $employee->id)->delete();
		$f = Education::where('employee_id', '=', $employee->id)->delete();
		$g = User::where('employee_id', '=', $employee->id)->delete();
		$employee->delete();
		return redirect()->route('employee.index')->with('messageDelete', 'Delete employee successfully!');
	}
	public function exportExcel() {
		Excel::create('List Device', function ($excel) {
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
				$sheet->setFontFamily('Times New Roman');
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
				array_push($data, array('STT', 'NAME DEVICE', 'SERIAL DEVICE', 'RECEIVE DATE', 'STATUS', 'DISTRIBUTION'));

				/*CONTENT EXCEL*/
				$device = Device::all();
				$number = 0;
				foreach ($device as $key => $value) {
					$device[$key]->device_name = KindDevice::find($value->kind_device_id)->device_name;
			//$device[$key]->employee_code = Employee::find($value->id)->employee_code;
			$device[$key]->status = StatusDevice::find($value->status_id)->status;
			$device[$key]->receive_date = ReceiveDevice::find($value->id)->receive_date;
			
			$device[$key]->distribution = InformationDevice::find($value->information_id)->distribution;
					$number++;
					array_push($data, array(
						$number,
						$value->device_name,
						$value->serial_device,
						$value->receive_date,
						$value->status,
						$value->distribution,
					
					));
				}
				$sheet->fromArray($data, null, 'A1', false, false);
			});
		})->download('xls');
	}


}
