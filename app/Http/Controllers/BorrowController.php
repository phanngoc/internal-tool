<?php namespace App\Http\Controllers;

use App;
use App\Device;
use App\Employee;
use App\StatusDevice;
use Input;
use Request;

class BorrowController extends AdminController {

	/**
	 * Display list device be assigned to
	 * 
	 * @return Response view
	 */
	public function index() {
		$devices   = Device::all();
		$employees = Employee::all();
		$employall = array();
		$employall += array('0' => 'None');
		foreach ($employees as $key => $value) {
			$employall += array($value->id => $value->lastname . " " . $value->firstname);
		}
		$statusall = StatusDevice::lists('status', 'id');
		return view('devices.borrow', compact('devices', 'employall', 'statusall'));
	}

	/**
	 * Save information of device be assigned to
	 * 
	 * @param  Request $request 
	 * @return void
	 */
	public function save(Request $request) {
		$data = Request::input('data');
		Device::find($data['id'])->update($data);
	}
}