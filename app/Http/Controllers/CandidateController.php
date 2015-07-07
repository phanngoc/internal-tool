<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\Http\Requests\AddCandidateRequest;
use Input;
use App\File;
use App\Http\Requests\EditCandidateRequest;

use Illuminate\Http\Request;

class CandidateController extends AdminController {

	/**
	 * Display listing candidate
	 *
	 * @return Response
	 */
	public function index()
	{
		$candidates = Candidate::all();
		return view('candidates.listcandidate', compact('candidates'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('candidates.addcandidate');
	}

	public function convert_datetimesql_to_datepicker($date) {
		$year = substr($date, 0, 4);
		$month = substr($date, 5, 2);
		$day = substr($date, 8, 2);
		$res = $day . "/" . $month . "/" . $year;
		return $res;
	}

	public function convert_datepicker_to_datetimesql($date) {
		$day = substr($date, 0, 2);
		$month = substr($date, 3, 2);
		$year = substr($date, 6, 4);
		$mysqltime = date("Y-m-d H:i:s", strtotime($year . "-" . $month . "-" . $day));
		return $mysqltime;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddCandidateRequest $request)
	{
		$candidates = new Candidate();
		$files = new File();

	    $requestdata = $request->all();
		$requestdata['date_of_birth'] = $this->convert_datepicker_to_datetimesql($request->get('dateofbirth'));
		$requestdata['date_submit'] = $this->convert_datepicker_to_datetimesql($request->get('datesubmit'));

		$candidates->first_name = $request->get('firstname');
	    $candidates->last_name = $request->get('lastname');
	    $candidates->date_of_birth = $requestdata['date_of_birth'];
	    $candidates->phone = $request->get('phone');
	    $candidates->email = $request->get('email');
	    $candidates->date_submit = $requestdata['date_submit'];
	    $candidates->save();

	    $destinationPath = public_path().'/files/'.$candidates->id;

	    /*Files*/
		if (Input::hasFile('files')) {
			$file = Input::file('files');
			foreach ($file as $f) {
		        $filename        = $f->getClientOriginalName();
		        $uploadSuccess   = $f->move($destinationPath, $filename);
		        $files->create([
					'candidate_id' => $candidates->id,
					'name' => $filename,
				]);
			}
	    }

		return redirect()->route('candidates.index')->with('messageOk', 'Add candidate successfully!');;
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$candidate = Candidate::find($id);
		$candidate->date_of_birth = $this->convert_datetimesql_to_datepicker($candidate->date_of_birth);
		$candidate->date_submit = $this->convert_datetimesql_to_datepicker($candidate->date_submit);

		$f1 = File::lists('id');
		$f2 = $candidate->files->lists('name', 'id');

		return view('candidates.editcandidate', compact('candidate', 'f1', 'f2'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditCandidateRequest $request)
	{
		$candidate = Candidate::find($id);
		$fff = new File();
		
	    $destinationPath = public_path().'/files/'.$candidate->id.'/';
	    //dd($destinationPath);

		$requestdata = $request->all();
		$requestdata['date_of_birth'] = $this->convert_datepicker_to_datetimesql($request->get('dateofbirth'));
		$requestdata['date_submit'] = $this->convert_datepicker_to_datetimesql($request->get('datesubmit'));
		$candidate->update([
			'first_name' => $request->get('firstname'),
			'last_name' => $request->get('lastname'),
			'date_of_birth' => $requestdata['date_of_birth'],
			'phone' => $request->get('phone'),
			'email' => $request->get('email'),
			'date_submit' => $requestdata['date_submit'],
		]);

		/*Xoa file trong select*/
		foreach($candidate->files as $value){
			$check = in_array($value->id, $request['delete_files']);
			if(!$check){
				if(file_exists($destinationPath.$value->name)){
					unlink($destinationPath.$value->name);
				}
				$f1 = File::where('id', '=', $value->id)->delete();
			}
		}

		/*UP load len file moi*/
		if (Input::hasFile('files')) {
			$file = Input::file('files');
			foreach ($file as $f) {
		        $filename        = $f->getClientOriginalName();
		        $uploadSuccess   = $f->move($destinationPath, $filename);
		        $fff->create([
					'candidate_id' => $candidate->id,
					'name' => $filename,
				]);
			}
	    }

		return redirect()->route('candidates.index')->with('messageOk', 'Update candidate successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$candidate = Candidate::find($id);
		$files = File::where('candidate_id', '=', $candidate->id)->delete();
		$candidate->delete();

		return redirect()->route('candidates.index')->with('messageDelete', 'Delete candidate successfully!');
	}

}
