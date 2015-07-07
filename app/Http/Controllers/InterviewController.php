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
use App\InterviewSchedule;

class InterviewController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$interviews = InterviewSchedule::all();
		foreach ($interviews as $key => $value) {
			
		}
		$employees	= Employee::all();
		$employall = array();
		$employall += array('0' => 'None');
		foreach ($employees as $key => $value) {
			 $employall += array($value->id => $value->lastname." ".$value->firstname);
		}
		return view('employee.interview',compact('interviews','employall'));
	}

	public function save()
	{
		$data = Request::input('data');
		InterviewSchedule::find($data['id'])->update($data);
		
	}
}