<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Support\Facades\Redirect;
use Input;
use Request;
use App\NoteStatus;
use App\StatusRecord;
use App\Http\Requests\AddStatusRecord;

class StatusRecordController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$statusrecord = StatusRecord::all();
		return view('employee.statusrecord',compact('statusrecord'));
	}

    /**
	 * Direct to add status record page
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('employee.addstatusrecord');
	}

	/**
	 * Insert  and Direct to status record
	 * @param  AddStatusRecord
	 * @return reponse
	 */
	public function savecreate(AddStatusRecord $request)
	{
		StatusRecord::create($request->all());
		return redirect()->route('statusrecord')->with('messageOk', 'Add user successfully!');
	}

	/**
	 * delete  and Direct to status record
	 * @param  id
	 * @return reponse
	 */
	public function destroy($id)
	{
		$statusrecord = StatusRecord::find($id);
		$statusrecord->delete();
		return redirect()->route('statusrecord')->with('messageDelete', 'Delete user successfully!');
	}
	
	/**
	 * update status
	 * @return response
	 */
	public function saveedit()
	{
		$data = Request::input('status');
		StatusRecord::find($data['id'])->update($data);
	}
}