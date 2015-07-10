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
use App\ModelDevice;
use App\TypeDevice;
use Input;

class OverviewController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$devices = Device::all();
		$position = Position::all();

		$types = TypeDevice::all();
		$models = ModelDevice::all();
		$kinds = KindDevice::all();
		$statuses = StatusDevice::all();
		$os = OperatingSystem::all();
		$contract = InformationDevice::all();

		foreach ($devices as $key => $value) {

			$value->device_name = $value->kind_device->device_name;
			$value->status = $value->status_devices->status;
			$employee = $value->employee;
			if ($employee) {
				$value->employee_code = $employee->employee_code;
				$value->fullname = $employee->lastname . " " . $employee->firstname;
				$value->employee_position = $employee->departments['name'];
			} else {
				$value->employee_code = "";
				$value->fullname = "";
				$value->employee_position = "";
			}
		}
		return view('overviewdevices.overview', compact('devices', 'position', 'types', 'models', 'kinds', 'statuses', 'os', 'contract'));
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

	public function postTypeDevice() {
		$id = isset($_GET['id']) ? (int) $_GET['id'] : false;
		//$id_feature = isset($_GET['id_feature']) ? (int) $_GET['id_feature'] : false;
		$models = ModelDevice::where('type_id', '=', $id)->get();
		$data = array();
		foreach ($models as $key => $value) {
			/*if ($value->id == $id_feature) {
				continue;
			}*/

			$item = array("id" => $value->id, "name" => $value->model_name);
			array_push($data, $item);
		}
		echo json_encode($data);
		//return View('features.addfeature', compact('feature'));
	}

	public function postModelDevice() {
		$id = isset($_GET['id']) ? (int) $_GET['id'] : false;
		//$id_feature = isset($_GET['id_feature']) ? (int) $_GET['id_feature'] : false;
		$kinds = KindDevice::where('model_id', '=', $id)->get();
		$data = array();
		foreach ($kinds as $key => $value) {
			/*if ($value->id == $id_feature) {
				continue;
			}*/

			$item = array("id" => $value->id, "name" => $value->device_name);
			array_push($data, $item);
		}
		echo json_encode($data);
		//return View('features.addfeature', compact('feature'));
	}

	public function filter(){
		$type_id = Input::get('type_device');
		$model_id = Input::get('model_device');
		$kind_id = Input::get('kind_device');
		$status_id = Input::get('status_device');
		$os_id = Input::get('os_device');
		$contract_id = Input::get('contract_number');

		$position = Position::all();
		$types = TypeDevice::all();
		$models = ModelDevice::all();
		$kinds = KindDevice::all();
		$statuses = StatusDevice::all();
		$os = OperatingSystem::all();
		$contract = InformationDevice::all();

		/*if(!$type_id && !$model_id && !$kind_id && !$status_id && !$os_id && !$contract_id){
			return redirect()->route('overview.index')->with('devices', 'position', 'types', 'models', 'kinds', 'statuses', 'os', 'contract');
		}*/

		/*Thuc hien cau truy van de lay du lieu sau khi filter*/
		$devices = Device::whereHas('kind_device', function($query) use($type_id){
			if($type_id){
				$query->whereHas('model_device', function($query) use($type_id){
					$query->whereHas('type_devices', function($query) use($type_id){
						$query->where('id', '=', $type_id);
					});
				});
			}
		})
		->whereHas('kind_device', function($query) use($model_id){
			if($model_id){
				$query->whereHas('model_device', function($query) use($model_id){
					$query->where('id', '=', $model_id);
				});
			}
		})
		->whereHas('kind_device', function($query) use($kind_id){
			if($kind_id){
				$query->where('id', '=', $kind_id);
			}
		})
		->whereHas('status_devices', function($query) use($status_id){
			if($status_id){
				$query->where('id', '=', $status_id);
			}
		})
		->whereHas('operating_system', function($query) use($os_id){
			if($os_id){
				$query->where('id', '=', $os_id);
			}
		})
		->whereHas('infomation_device', function($query) use($contract_id){
			if($contract_id){
				$query->where('id', '=', $contract_id);
			}
		})->get();

		foreach ($devices as $key => $value) {
			$value->device_name = $value->kind_device->device_name;
			$value->status = $value->status_devices->status;
			$employee = $value->employee;
			if ($employee) {
				$value->employee_code = $employee->employee_code;
				$value->fullname = $employee->lastname . " " . $employee->firstname;
				$value->employee_position = $employee->departments['name'];
			} else {
				$value->employee_code = "";
				$value->fullname = "";
				$value->employee_position = "";
			}
		}
		echo json_encode($devices);
	}
}
