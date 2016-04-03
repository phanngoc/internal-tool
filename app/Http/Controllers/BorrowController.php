<?php namespace App\Http\Controllers;

use App;
use App\Device;
use App\Employee;
use App\StatusDevice;
use Input;
use Request;
use App\Models\BorrowDevice;

class BorrowController extends AdminController {

	
	public $timestamps = true;
	
	/**
	 * Display list device be assigned to
	 * 
	 * @return Response view
	 */
	public function index() {
		$devices = Device::with('kind_device','status_devices')
					->get();
		foreach ($devices as $key => $device) {
			// borrowed or granted
			if ($device->status_id == 1 || $device->status_id == 2) {
				$rowBorrowDevice = BorrowDevice::where('device_id', $device->id)->orderBy('updated_at','desc')->first();
				if (!is_null($rowBorrowDevice)) {
					$devices[$key]->employee_id = $rowBorrowDevice->employee_id;
					$devices[$key]->note = $rowBorrowDevice->note;		
				}
			}					
		}						
		$employees = Employee::all();
		$employall = array();
		$employall += array('0' => 'None');
		foreach ($employees as $key => $value) {
			$employall += array($value->id => $value->lastname . " " . $value->firstname);
		}
		$statusall = StatusDevice::lists('status', 'id');

		$logAction = BorrowDevice::with('device','device.kind_device','employee')->get();
		return view('devices.borrow', compact('devices', 'employall', 'statusall', 'logAction'));
	}

	/**
	 * Load log action.
	 * @return [type] [description]
	 */
	public function loadLogAction() {
		$logAction = BorrowDevice::with('device','device.kind_device','employee')->orderBy('borrow_devices.created_at','desc')->get();
		$result = array();
		$datas = array();
		foreach ($logAction as $key => $log) {
			$data =  array($key, $log->device->kind_device->device_name, 
							$log->device->serial_device, 
							$log->employee->lastname." ".$log->employee->firstname,
							convertNumberToText($log->action),
							$log->note,
							$log->created_at->diffForHumans());
			array_push($datas, $data);
		}
		$result = array('data' => $datas);
		return response()->json($result);
	}

	/**
	 * Save information of device be assigned to
	 * 
	 * @param  Request $request 
	 * @return void
	 */
	public function save(Request $request) {
		$result = array('res_status' => 1);
		$data = Request::input('data');
		Device::find($data['id'])->update(['status_id' => $data['status_id']]);
		BorrowDevice::create([
			'device_id' => $data['id'],
			'employee_id' => $data['employee_id'],
			'note' => $data['note'],
			'action' => $data['status_id'],
			'return_date' => $data['return_date']
		]);
		return response()->json($result);
	}
}