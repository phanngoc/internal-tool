<?php

namespace App\Http\Controllers;

use App;
use App\Device;
use App\Employee;
use App\Http\Requests\AddDeviceRequest;
use App\Http\Requests\EditDeviceRequest;
use App\InformationDevice;
use App\KindDevice;
use App\OperatingSystem;
use App\Position;
use App\StatusDevice;
use Excel;
use Illuminate\Support\Facades\Redirect;

class DeviceController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$devices = Device::all();
		$position = Position::all();
		foreach ($devices as $key => $value) {
			/*$device[$key]->device_name = KindDevice::find($value->kind_device_id)->device_name;
			$device[$key]->contract_number = InformationDevice::find($value->information_id)->contract_number;
			$device[$key]->os_name = OperatingSystem::find($value->os_id)->os_name;*/
			$value->device_name = $value->kind_device->device_name;
			$value->contract_number = $value->infomation_device->contract_number;
			$value->os_name = $value->operating_system->os_name;
		}
		return view('devices.listdevice', compact('devices', 'position'));
	}

	/**
	 * @param $date
	 * @return mixed
	 */

	public function create() {
		$operatings = OperatingSystem::lists("os_name", "id");
		$kinds = KindDevice::lists("device_name", "id");
		$informations = InformationDevice::lists("contract_number", "id");
		$status = StatusDevice::lists("status", "id");
		return view('devices.adddevice', compact('operatings', 'kinds', 'informations', 'status'));
	}

	public function store(AddDeviceRequest $request) {

		$vld = Device::validate($request->all());
		if (!$vld->passes()) {

		//$vld = Device::validate($request);
		/*if (!$vld->passes()) {
>>>>>>> 561886bb1cbfcf29f6f6626be257a5ab810648e0
			return redirect()->route('devices.create')->with('messageNo', $vld->messages());
		}*/
		$device = new Device($request->all());
		$device->save();
		return redirect()->route('devices.index')->with('messageOk', 'Add device successfully!');
	}
}
	public function show($id) {
		$device = Device::find($id);
		$operatings = OperatingSystem::lists("os_name", "id");
		$kinds = KindDevice::lists("device_name", "id");
		$informations = InformationDevice::lists("contract_number", "id");
		$status = StatusDevice::lists("status", "id");
		return view('devices.editdevice', compact('device', 'status', 'informations', 'kinds', 'operatings'));
	}
	public function update($id, EditDeviceRequest $request) {
		//$vld = Device::validate($request, $id);
		/*if (!$vld->passes()) {
			return redirect()->route('devices.show')->with('messageNo', $vld->messages());
		}*/
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
