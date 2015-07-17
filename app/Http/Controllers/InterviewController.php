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
use App\StatusRecord;
use App\Candidate;
use DB;

class InterviewController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$interviews = Candidate::where('status_record_id',3)->get();
		$employees  = Employee::all();
		$employall  = array();
		$employall += array('0' => 'None');
		foreach ($employees as $key => $value) {
			 $employall += array($value->id => $value->lastname." ".$value->firstname);
		}
		$statusrecord = StatusRecord::lists('name', 'id');
		return view('employee.interview',compact('statusrecord','interviews','employall'));
	}

	public function save()
	{
		$data = Request::input('data');
		Candidate::find($data['id'])->update([
				'status_record_id' => $data['status_record_id'],
				'time_interview'   => $data['time_interview'],
				'time'             => $data['time']
		]);	
	
		if($data['employee_id'] != '')
		{
			Candidate::find($data['id'])->employees()->sync($data['employee_id']);	
		}
		
		if($data['status_record_id'] == 2)
		{
			$candidate = Candidate::find($data['id']);
			Employee::create([
				'firstname'     => $candidate->first_name,
				'lastname'      => $candidate->last_name,
				'phone'         => $candidate->phone,
				'email'         => $candidate->email,
				'position_id'   => $data['position'],
				'date_of_birth' => $candidate->date_of_birth,
			]);
		}
	}
}