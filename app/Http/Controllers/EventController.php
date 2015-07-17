<?php namespace App\Http\Controllers;
use App\Configure;
use App\Language;
use Illuminate\Http\Request;
use Input;
use App\Models\Event;
class EventController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$events = Event::all();
		$event_arr = array();
		foreach ($events as $key => $value) {
			$item = array(
				'id' => $value->id,
				'title' => $value->title,
				'start' => $value->start,
				'end'   => $value->end
			);	
			array_push($event_arr,$item);
		}
		$event_json = json_encode($event_arr);
		return view('events.calendars',compact('event_json'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store() {
		//dd(Input::get('data'));
		$data = Input::get('data');
		foreach ($data as $key => $value) {
			if(Event::find($value['id']) != null)
			{
			   Event::find($value['id'])->update([
			   	 'title' => $value['title'], 
			   	 'start' => $value['start'],
			   	 'end'	=> $value['end'],
			   ]);		
			}
			else
			{
			   Event::create(array(
			   	 'title' => $value['title'], 
			   	 'start' => $value['start'],
			   	 'end'	=> $value['end'],
			   ));	
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id) {
		//
	}
	
	public function update(Request $request) 
	{
	
		return redirect()->route('configures.index');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		//
	}

}
