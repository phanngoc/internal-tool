<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Poll;
use App\PollAnswer;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use Carbon\Carbon;

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

		$results = array();
		$poll = Poll::find($id);
		$results += array('poll' => $poll);
		$user_id = Auth::user()->id;

		// Check amount poll between start date and end date
    $dateCurrent = Carbon::now();
    $onePlusDate = Carbon::now()->addDay();
    $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $dateCurrent->format('Y-m-d').' '.'00:00:00');
    $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $onePlusDate->format('Y-m-d').' '.'00:00:00');

    $countAnswerInDay = DB::table('poll_answers')
        ->join('poll_user_answers', 'poll_user_answers.answer_id', '=', 'poll_answers.id')
        ->where('poll_answers.poll_id',$id)
        ->whereBetween('poll_user_answers.created_at', [$startDate, $endDate])
        ->count();
		$results += array('countAnswerInDay' => $countAnswerInDay);

		// show result after vote
		$isShowResultAfterVote = $poll->show_results_finish;
		$results += array('isShowResultAfterVote' => $isShowResultAfterVote);

		// Check excess time to poll
    $timeDeadline = Carbon::createFromFormat('Y-m-d H:i:s', $poll->end_date);
    $checkExcessDeadline = false;

		$results += array('isShowResultAfterDealine' => $poll->show_results);
    $votechart = array();
		$checkExcessDeadline = ($dateCurrent >= $timeDeadline);
		$results += array('checkExcessDeadline' => $checkExcessDeadline);

		// check to dealine and is show result
    if (($checkExcessDeadline && $poll->show_results) || ($isShowResultAfterVote)) {
			// if excess time, we can caculate answer percentage poll and show graph
    	$votechart = DB::table('poll_user_answers')
	      ->select(DB::raw('count(*) as value, answer as label'))
        ->join('poll_answers', 'poll_answers.id', '=', 'poll_user_answers.answer_id')
        ->where('poll_answers.poll_id',$id)
        ->groupBy('poll_user_answers.answer_id')
        ->get();

      $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
      foreach ($votechart as $key => $value) {
      	$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
      	$highlight = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
      	$votechart[$key]->color = $color;
      	$votechart[$key]->highlight = $highlight;
      }
    }
		$results += array('checkExcessDeadline' => $checkExcessDeadline, 'votechart' => $votechart);

		// caculate count vote and check is show vote number ?
		$countVote = 0;
		$showVoteNumber = $poll->show_vote_number;
    if ($showVoteNumber) {
			  $countVoteDb = DB::table('poll_answers')->select(DB::raw('count(*) as value'))
					  ->where('poll_id',$id)->first();
				$countVote = $countVoteDb->value;
		}

		// check have user already voted yet ?
		$checkUserVoted = DB::table('poll_answers')
				->join('poll_user_answers', 'poll_user_answers.answer_id', '=', 'poll_answers.id')
				->where('poll_answers.poll_id',$id)
				->count();

		$results += array('countVote' => $countVote, 'showVoteNumber' => $showVoteNumber, 'checkUserVoted' => $checkUserVoted);

		if ($poll) {
			return view("polls.vote", $results);
		}
		abort(404);

	}

	/**
	 * Process submit vote.
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
				}
			}
		}
		return redirect(route('showvote',$id))->with('showResultAfterVote', true);
	}

}
