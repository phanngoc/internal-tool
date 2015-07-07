<?php

namespace App\Http\Controllers;

use App;
use App\Device;
use App\Employee;
use App\Http\Requests\AddDeviceRequest;
use App\InformationDevice;
use App\KindDevice;
use App\OperatingSystem;
use App\Position;
use App\StatusDevice;
use Excel;
use Illuminate\Support\Facades\Redirect;

class OverviewController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$devices = Device::all();

		$position = Position::all();
		foreach ($devices as $key => $value) {

			//$device[$key]->device_name = KindDevice::find($value->kind_device_id)->device_name;
			//$device[$key]->status = StatusDevice::find($value->status_id)->status;
			//$device[$key]->distribution = InformationDevice::find($value->information_id)->distribution;
			//$device[$key]->employee_code = Employee::find($value->employee_id)->employee_code;
			//$device[$key]->lastname = Employee::find($value->employee_id)->lastname;
			//$device[$key]->firstname = Employee::find($value->employee_id)->firstname;
			//$device[$key]->position_id = Employee::find($value->employee_id)->position_id;

			$value->device_name = $value->kind_device->device_name;
			$value->status = $value->status_devices->status;
			$employee = $value->employee;
			if ($employee) {
				$value->employee_code = $employee->employee_code;
				$value->fullname = $employee->lastname . " " . $employee->firstname;
				$value->employee_position = $employee->departments->name;
			} else {
				$value->employee_code = "";
				$value->fullname = "";
				$value->employee_position = "";
			}
			//echo (json_encode($employee) . "<hr>");
		}
		return view('overviewdevices.overview', compact('devices', 'position'));
	}

	/**
	 * @param $date
	 * @return mixed
	 */

	public function create() {
		$operating = OperatingSystem::all();
		$operatings = array();
		foreach ($operating as $key => $value) {
			$operatings += array($value->id => $value->os_name);
		}
		$kind = KindDevice::all();
		$kinds = array();
		foreach ($kind as $key => $value) {
			$kinds += array($value->id => $value->device_name);
		}
		$info = InformationDevice::all();
		$infos = array();
		foreach ($info as $key => $value) {
			$infos += array($value->id => $value->contract_number);
		}
		$sta = StatusDevice::all();
		$stas = array();
		foreach ($sta as $key => $value) {
			$stas += array($value->id => $value->status);
		}

		return view('overviewdevices.adddevice', compact('operatings', 'kinds', 'infos', 'stas'));
	}

	public function store(AddDeviceRequest $request) {
		$device = new Device($request->all());
		$device->save();

		return redirect()->route('overviewdevice.index')->with('messageOk', 'Add device successfully!');
	}

	public function delete($id) {
		$device = Device::find($id);

		$device->delete();
		return redirect()->route('overviewdevice.index')->with('messageDelete', 'Delete device successfully!');
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

					$device[$key]->distribution = InformationDevice::find($value->information_id)->distribution;

					$device[$key]->employee_code = Employee::find($value->employee_id)->employee_code;
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
