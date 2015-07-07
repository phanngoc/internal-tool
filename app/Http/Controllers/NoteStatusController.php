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
use App\NoteStatus;
use App\StatusRecord;
class NoteStatusController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$notestatus = NoteStatus::all();
		$statusrecord = StatusRecord::all();
		$res_statusrecord = array();
		foreach ($statusrecord as $key => $value) {
			$res_statusrecord += array($value->id => $value->name);
		}
		return view('employee.notestatus',compact('notestatus','res_statusrecord'));
	}

	public function save()
	{
		$data = Request::input('note');
		NoteStatus::find($data['id'])->update($data);

	}
}