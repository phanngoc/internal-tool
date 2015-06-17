<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Position;
use App\User;
use App\Validator;
use DateTime;
use Excel;
use Illuminate\Http\Request;

class EmployeeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$employees = Employee::all();
		foreach ($employees as $key => $value) {
			$employees[$key]['position_name'] = Position::find($value->position_id)->name;
		}
		return view('employee.listemployee', compact('employees'));
	}

	public function api_listposition() {
		$positions = Position::all();
		$responses = array();
		foreach ($positions as $key => $value) {
			$item = array(
				'id' => $value->id,
				'name' => $value->name,
				'description' => $value->description,
			);
			array_push($responses, $item);
		}
		echo json_encode($responses);
	}

	public function api_listuser() {
		$users = User::all();
		$responses = array();
		foreach ($users as $key => $value) {
			$item = array(
				'id' => $value->id,
				'fullname' => $value->fullname,
			);
			array_push($responses, $item);
		}
		echo json_encode($responses);
	}

	public function api_showemployee() {
		$employees = Employee::all();
		$response = array();
		foreach ($employees as $kem => $valem) {
			$item = array(
				"id" => $valem->id,
				"firstname" => $valem->firstname,
				"lastname" => $valem->lastname,
				"phone" => $valem->phone,
				"employee_code" => $valem->employee_code,
			);
			//dd($valem->user());
			$item += array('position' => $valem->position()->get()->first());
			$item += array('email' => $valem->user()->get()->first()->email);
			array_push($response, $item);
		}
		echo json_encode($response);
	}

	public function api_updateemployee(Request $request) {
		//$a = new User();
		$employee = Employee::find($request->input('id'));

		$validator = Validator::make(
			[
				'firstname' => $request->input('firstname'),
				'lastname' => $request->input('lastname'),
				'phone' => $request->input('phone'),
				'position_id' => $request->input('position'),
				'employee_code' => $request->input('employee_code'),
				'email' => $request->input('email'),
			]
			, [
				'firstname' => ['required'],
				'lastname' => ['required'],
				'phone' => ['required', 'digits_between:6,15'],
				'position_id' => ['required', 'digits_between:1,15'],
				'employee_code' => ['required'],
				'email' => ['required', 'email'],
			]
		);

		if ($validator->fails()) {
			return "ok";
		}

		$employee->update([
			'firstname' => $request->input('firstname'),
			'lastname' => $request->input('lastname'),
			'phone' => $request->input('phone'),
			'position_id' => $request->input('position'),
			'employee_code' => $request->input('employee_code'),
		]);
		$employee->user()->update(['email' => $request->input('email')]);
		$item = array("id" => $request->input('id'),
			"firstname" => $request->input('firstname'),
			"lastname" => $request->input('lastname'),
			"phone" => $request->input('phone'),
			"position" => Position::find($request->input('position')),
			'email' => $request->input('email'),
			'employee_code' => $request->input('employee_code'),
		);

		echo json_encode($item);
	}

	public function api_deleteemployee(Request $request) {
		$employee = Employee::find($request->input('id'));
		$employee->delete();
		$item = array("id" => $request->input('id'),
			"firstname" => $request->input('firstname'),
			"lastname" => $request->input('lastname'),
			"phone" => $request->input('phone'),
			"position" => Position::find($request->input('position')),
			'email' => $request->input('email'),
			'employee_code' => $request->input('employee_code'),
		);
		echo json_encode($item);
	}

	public function api_addemployee(Request $request) {

		$employee = Employee::create([
			'firstname' => $request->input('firstname'),
			'lastname' => $request->input('lastname'),
			'phone' => $request->input('phone'),
			'position_id' => $request->input('position'),
			'employee_code' => $request->input('employee_code'),
			'user_id' => $request->input('user_id'),
		]);

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
					'G' => '20',
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
