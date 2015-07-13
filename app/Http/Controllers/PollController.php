<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Poll;
use App\PollAnswer;
use Illuminate\Http\Request;

class PollController extends AdminController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$polls = Poll::all();
		foreach ($polls as $key => $value) {
			$value->total_vote = $value->answers()->count();
		}
		return view("polls.listpoll", compact("polls"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		return view('polls.addpoll');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request) {
		$vld = Poll::validate($request->all());
		if (!$vld->passes()) {
			return json_encode($vld->messages());
		}
		$poll = Poll::create($request->all());

		foreach ($request->answer as $key => $value) {
			PollAnswer::create([
				'poll_id' => $poll->id,
				'answer' => $value,
				'order' => $request->order[$key],
				'color' => $request->color[$key],
			]);
		}
		return redirect()->route("polls.index")->with("messageOk", "Add Poll Success");
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$poll = Poll::find($id);
		if ($poll != null) {
			$answers = $poll->answers;
			return view("polls.editpoll", compact('poll', 'answers'));
		}
		return redirect()->route("polls.index");
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

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, $id) {
		$vld = Poll::validate($request->all());
		if (!$vld->passes()) {
			return json_encode($vld->messages());
		}
		$poll = Poll::find($id);
		if ($poll != null) {
			$poll->update($request->all());
			$poll->answers()->delete();
			foreach ($request->answer as $key => $value) {
				if ($value != "") {
					PollAnswer::create([
						'poll_id' => $poll->id,
						'answer' => $value,
						'order' => str_replace("#", "", $request->order[$key]),
						'color' => $request->color[$key],
					]);
				}

			}
		}
		return redirect()->route("polls.index")->with("messageOk", "Add Poll Success");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$poll = Poll::find($id);
		if ($poll != null) {
			$poll->answers()->delete();
			$poll->delete();
		}
		return redirect()->route("polls.index")->with("messageOk", "Delete Poll Success");
	}

	public function showvote($id) {
		$poll = Poll::find($id);
		if ($poll) {
			$poll->answers;
			return view("polls.vote", compact('poll'));
		}
	}
	public function vote($id, Request $request) {
		if ($request->answer) {
			foreach ($request->answer as $key => $value) {
				$pollanswer = PollAnswer::find($value);
				if ($pollanswer) {
					$pollanswer->attach(\Auth::user()->id);
					//echo json_encode($pollanswer->users()); //->sync(\Auth::user()->id);
				}
			}
		}
	}

}
