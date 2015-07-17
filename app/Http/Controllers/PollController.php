<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Poll;
use App\PollAnswer;
use Illuminate\Http\Request;

class PollController extends AdminController {
	/**
	 * Display a list poll.
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
	 * Show the form for creating a new poll.
	 *
	 * @return Response
	 */
	public function create() {
		return view('polls.addpoll');
	}

	/**
	 * Store a newly created poll in storage.
	 * @param  Illuminate\Http\Request request
	 * @return Response
	 */
	public function store(Request $request) {
		$vld = Poll::validate($request->all());
		if (!$vld->passes()) {
			return Redirect::back()->withErrors($vld->messages());
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
	 * Display the specified poll.
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
	 * Update the specified poll in storage.
	 *
	 * @param  int  $id
	 * @param Illuminate\Http\Request $request
	 * @return Response
	 */
	public function update(Request $request, $id) {
		$vld = Poll::validate($request->all());
		if (!$vld->passes()) {
			return Redirect::back()->withErrors($vld->messages());
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
	 * Remove the specified poll from storage.
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

	/**
	 * show vote
	 * @param  int $id [description]
	 * @return Response
	 */
	public function showvote($id) {
		$poll = Poll::find($id);
		if ($poll) {
			$poll->answers;
			return view("polls.vote", compact('poll'));
		}
	}

	/**
	 * [vote description]
	 * @param  [int  $id      [description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
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
