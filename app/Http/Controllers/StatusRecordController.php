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

	public function create()
	{
		return view('employee.addstatusrecord');
	}

	public function savecreate(AddStatusRecord $request)
	{
		StatusRecord::create($request->all());
		return redirect()->route('statusrecord')->with('messageOk', 'Add user successfully!');
	}

	public function destroy($id)
	{
		$statusrecord = StatusRecord::find($id);
		$statusrecord->delete();
		return redirect()->route('statusrecord')->with('messageDelete', 'Delete user successfully!');
	}
	public function saveedit()
	{
		$data = Request::input('status');
		StatusRecord::find($data['id'])->update($data);
	}
}