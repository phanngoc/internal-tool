<?php

namespace App\Http\Controllers;

use App;


use Excel;
use App\Http\Requests\AddDeviceRequest;
use App\Http\Requests\EditDeviceRequest;
use App\Device;
use App\InformationDevice;
use App\KindDevice;
use App\ModelDevice;
use App\OperatingSystem;
use App\TypeDevice;
use App\Employee;
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

		
			foreach ($device as $key => $value) {
		
			$device[$key]->device_name = KindDevice::find($value->kind_device_id)->device_name;
			$device[$key]->status = StatusDevice::find($value->status_id)->status;
			$device[$key]->contract_number = InformationDevice::find($value->information_id)->contract_number;
			$device[$key]->os_name = OperatingSystem::find($value->os_id)->os_name;
			
			
		}
		
		return view('devices.listdevice', compact('device','position'));
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
		$in = InformationDevice::all();
		$ins = array();
		foreach ($in as $key => $value) {
			$ins += array($value->id => $value->contract_number);
		}
		$sta = StatusDevice::all();
		$stas = array();
		foreach ($sta as $key => $value) {
			$stas += array($value->id => $value->status);
		}
		
		return view('devices.adddevice', compact('operatings','kinds','ins','stas'));
	}

	public function store(AddDeviceRequest $request) {
		$device = new Device($request->all());
	
		$device->save();
	
		return redirect()->route('devices.index')->with('messageOk', 'Add device successfully!');
	}

	public function show($id) {
		$device = Device::find($id);
		
		$infos = InformationDevice::all();
		$status = StatusDevice::all();
		$kinds = KindDevice::all();
		$opes = OperatingSystem::all();
	
		return view('devices.editdevice', compact('device','status','infos','kinds','opes'));
	}
		public function update($id, EditDeviceRequest $request) {
		$device = Device::find($id);
	
		$device->update([
			'serial_device' => $request['serial_device'],
			'information_id' => $request['information_id'],
			'os_id' => $request['os_id'],
			'status_id' => $request['status_id'],
			'kind_device_id' => $request['kind_device_id'],
		]);
	

		return redirect()->route('devices.index')->with('messageOk', 'Update device successfully!');
	}

	public function delete($id) {
		$device = Device::find($id);

		
		
	
		$device->delete();
		return redirect()->route('devices.index')->with('messageDelete', 'Delete device successfully!');
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
