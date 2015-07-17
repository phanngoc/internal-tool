<?php namespace App\Http\Controllers;

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
	 * Display list devices
	 *
	 * @return Response
	 */
	public function index() {
		$devices  = Device::all();
		$position = Position::all();
		foreach ($devices as $key => $value) {
			$value->device_name     = $value->kind_device->device_name;
			$value->contract_number = $value->infomation_device->contract_number;
			$value->os_name         = $value->operating_system->os_name;
		}
		return view('devices.listdevice', compact('devices', 'position'));
	}

	/**
	 * Showing a form to create newly device
	 * 
	 * @return [type] [description]
	 */
	public function create() {
		$operatings   = OperatingSystem::lists("os_name", "id");
		$kinds        = KindDevice::lists("device_name", "id");
		$informations = InformationDevice::lists("contract_number", "id");
		$status       = StatusDevice::lists("status", "id");
		return view('devices.adddevice', compact('operatings', 'kinds', 'informations', 'status'));
	}

	/**
	 * Store newly a device
	 * 
	 * @param  AddDeviceRequest $request
	 * @return Response
	 */
	public function store(AddDeviceRequest $request) {
		$vld = Device::validate($request->all());
		$vld = Device::validate($request->all());
		if (!$vld->passes()) {
			return redirect()->route('devices.create')->with('messageNo', $vld->messages());
		}
		$device = new Device($request->all());
		$device->save();
		return redirect()->route('devices.index')->with('messageOk', 'Add device successfully!');
	}

	/**
	 * Showing device's information
	 * 
	 * @param  [int] $id
	 * @return Response
	 */
	public function show($id) {
		$device       = Device::find($id);
		$operatings   = OperatingSystem::lists("os_name", "id");
		$kinds        = KindDevice::lists("device_name", "id");
		$informations = InformationDevice::lists("contract_number", "id");
		$status       = StatusDevice::lists("status", "id");
		return view('devices.editdevice', compact('device', 'status', 'informations', 'kinds', 'operatings'));
	}

	/**
	 * Update device's information
	 * 
	 * @param  [int]            $id
	 * @param  EditDeviceRequest $request
	 * @return Response
	 */
	public function update($id, EditDeviceRequest $request) {
		$device = Device::find($id);
		$device->update([
			'serial_device'  => $request['serial_device'],
			'information_id' => $request['information_id'],
			'os_id'          => $request['os_id'],
			'status_id'      => $request['status_id'],
			'kind_device_id' => $request['kind_device_id'],
		]);
		return redirect()->route('devices.index')->with('messageOk', 'Update device successfully!');
	}

	/**
	 * Delete device
	 * 
	 * @param  [int] $id 
	 * @return Response
	 */
	public function delete($id) {
		$device = Device::find($id);
		$device->delete();
		return redirect()->route('devices.index')->with('messageDelete', 'Delete device successfully!');
	}

	/**
	 * Export to excel list device
	 * 
	 * @return file excel
	 */
	public function exportExcel() {
		Excel::create('List Device', function ($excel) {
			$excel->sheet('Sheetname', function ($sheet) {
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
				array_push($data, array('STT', 'NAME DEVICE', 'SERIAL DEVICE', 'RECEIVE DATE', 'STATUS',));

				/*CONTENT EXCEL*/
				$device = Device::all();
				$number = 0;
				foreach ($device as $key => $value) {
					$device[$key]->device_name = KindDevice::find($value->kind_device_id)->device_name;
					$device[$key]->status = StatusDevice::find($value->status_id)->status;
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
