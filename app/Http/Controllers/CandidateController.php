<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\Http\Requests\AddCandidateRequest;
use Input;
use App\FileCandidate;
use App\Http\Requests\EditCandidateRequest;
use Illuminate\Http\Request;
use App\StatusRecord;
use App\Position;
use Zipper;


class CandidateController extends AdminController {

	/**
	 * Display list candidates
	 *
	 * @return Response view
	 */
	public function index()
	{
		$candidates = Candidate::whereIn('status_record_id', [1, 2, 3, 4 ,5])->get();
		return view('candidates.listcandidate', compact('statusrecord','candidates'));
	}

	/**
	 * Function to compress file of candidate
	 *
	 * @param  [int] $id [candidate id]
	 * @return void
	 */
	public function zipfile($id)
	{
		  $file_path = public_path() . '/files/'.$id.'/All.zip';
	    if (!file_exists($file_path)) {
			$files  = glob(public_path().'/files/'.$id.'/*');
			$zipper = Zipper::make(public_path().'/files/'.$id.'/All.zip')->add($files);
	    }
	}

	/**
	 * Display a form to create new candidate
	 *
	 * @return Response view
	 */
	public function create()
	{
		$status_records = StatusRecord::lists('name', 'id');
		$positions      = Position::lists('name','id');
		return view('candidates.addcandidate',compact('positions','status_records'));
	}

	/**
	 * Function to convert datetime sql to datepicker
	 *
	 * @param  [string] $date
	 * @return [string] $res
	 */
	public function convert_datetimesql_to_datepicker($date) {
		$year  = substr($date, 0, 4);
		$month = substr($date, 5, 2);
		$day   = substr($date, 8, 2);
		$res   = $day . "/" . $month . "/" . $year;
		return $res;
	}

	/**
	 * Function to convert datepicker to datetime sql
	 *
	 * @param  [string] $date
	 * @return [string] $mysqltime
	 */
	public function convert_datepicker_to_datetimesql($date) {
		$day       = substr($date, 0, 2);
		$month     = substr($date, 3, 2);
		$year      = substr($date, 6, 4);
		$mysqltime = date("Y-m-d H:i:s", strtotime($year . "-" . $month . "-" . $day));
		return $mysqltime;
	}

	/**
	 * Function to store newly a candidate
	 *
	 * @param  AddCandidateRequest $request
	 * @return Response view
	 */
	public function store(AddCandidateRequest $request)
	{
		$candidates                   = new Candidate();
		$files                        = new File();
		$requestdata                  = $request->all();
		$requestdata['date_of_birth'] = $this->convert_datepicker_to_datetimesql($request->get('dateofbirth'));
		$requestdata['date_submit']   = $this->convert_datepicker_to_datetimesql($request->get('datesubmit'));
		$candidates->first_name       = $request->get('firstname');
		$candidates->last_name        = $request->get('lastname');
		$candidates->date_of_birth    = $requestdata['date_of_birth'];
		$candidates->phone            = $request->get('phone');
		$candidates->email            = $request->get('email');
		$candidates->date_submit      = $requestdata['date_submit'];
		$candidates->comment          = $requestdata['comment'];
		$candidates->status_record_id = 1;
	    $candidates->save();
	    $candidates->attachPosition($request['position']);

	    $destinationPath = public_path().'/files/'.$candidates->id;

	    for ($i = 0; $i < 10; $i++) {
	    	if (Input::file('files'.$i)) {
				$file          = Input::file('files'.$i);
				$titlefile     = $request->get('titlefile'.$i);
				$filename      = $file->getClientOriginalName();
				$uploadSuccess = $file->move($destinationPath, $filename);
		        $files->create([
					'candidate_id' => $candidates->id,
					'name'         => $filename,
					'title'        => $titlefile,
				]);
	    	}
	    }
		return redirect()->route('candidates.index')->with('messageOk', 'Add candidate successfully!');
	}

	/**
	 * Display candidate's information
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$candidate = Candidate::find($id);
		$candidate->date_of_birth = $this->convert_datetimesql_to_datepicker($candidate->date_of_birth);
		$candidate->date_submit = $this->convert_datetimesql_to_datepicker($candidate->date_submit);

		$f1             = FileCandidate::lists('id');
		$f2             = $candidate->filecandidates()->get();

		$status_records = StatusRecord::whereIn('id', array(1, 3, 4))->get();
		$res_status     = array();
		foreach ($status_records as $k_sta => $v_sta) {
			$res_status += array($v_sta->id => $v_sta->name);
		}
		$status_records = $res_status;
		$positions      = Position::lists('name','id');
		return view('candidates.editcandidate', compact('positions','status_records','candidate', 'f1', 'f2'));
	}

	/**
	 * Show the form for editing candidate
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update candidate's information
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditCandidateRequest $request)
	{
		$candidate                    = Candidate::find($id);
		$filemodel                    = new FileCandidate;
		$destinationPath              = public_path().'/files/'.$candidate->id.'/';
		$requestdata                  = $request->all();
		$requestdata['date_of_birth'] = $this->convert_datepicker_to_datetimesql($request->get('dateofbirth'));
		$requestdata['date_submit']   = $this->convert_datepicker_to_datetimesql($request->get('datesubmit'));
		$candidate->update([
			'first_name'       => $request->get('firstname'),
			'last_name'        => $request->get('lastname'),
			'date_of_birth'    => $requestdata['date_of_birth'],
			'phone'            => $request->get('phone'),
			'email'            => $request->get('email'),
			'date_submit'      => $requestdata['date_submit'],
			'status_record_id' => $requestdata['status_record_id'],
			'comment'          => $requestdata['comment'],
		]);

		$candidate->attachPosition($requestdata['position']);

		if (array_key_exists('files', $requestdata) && ($candidate->filecandidates != null)) {

			 foreach($candidate->filecandidates as $value){
				$check = in_array($value->id, $requestdata['files']);
				if(!$check){
					if(file_exists($destinationPath.$value->name)){
						unlink($destinationPath.$value->name);
					}
					$f1 = FileCandidate::where('id', '=', $value->id)->delete();
				}
				else
				{
					FileCandidate::where('id', '=', $value->id)->update(['title' => $requestdata['titlefile'.$value->id] ]);
				}
			}
		}

	    for ($i = 0; $i < 10; $i++) {
	    	if (Input::file('files_new'.$i))
	    	{
				$file          = Input::file('files_new'.$i);
				$filename      = $file->getClientOriginalName();
				$uploadSuccess = $file->move($destinationPath, $filename);
		        FileCandidate::create([
					'candidate_id' => $candidate->id,
					'name'         => $filename,
					'title'        => $requestdata['title_news'.$i],
					'document_type' => 'FileCandidate',
				]);
	    	}
	    }
		return redirect()->route('candidates.index')->with('messageOk', 'Update candidate successfully');
	}

	/**
	 * Delete candidate
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$candidate = Candidate::find($id);
		$files     = File::where('candidate_id', '=', $candidate->id)->delete();
		$candidate->delete();
		return redirect()->route('candidates.index')->with('messageDelete', 'Delete candidate successfully!');
	}
}
