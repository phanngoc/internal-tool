<?php

namespace App\Http\Controllers;

use App;

use App\Employee;
use Excel;
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

class BorrowController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$devices = Device::all();
		foreach ($devices as $key => $value) {
			
		}
		//dd(StatusDevice::find(1)->devices()->get());
		//dd(Device::find(1)->status_devices()->first());
		//dd($devices);
		$employees	= Employee::all();
		$employall = array();
		$employall += array('0' => 'None');
		foreach ($employees as $key => $value) {
			 $employall += array($value->id => $value->lastname." ".$value->firstname);
		}
		$statusall = StatusDevice::lists('status','id');
		return view('device.borrow',compact('devices','employall','statusall'));
	}

	public function save(Request $request)
	{
		$data = Request::input('data');
		// Device::find($data['data']['id'])
		Device::find($data['id'])->update($data);
		dd($data);
	}
}