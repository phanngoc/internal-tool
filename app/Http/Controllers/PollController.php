<?php namespace App\Http\Controllers;

//use App\Http\Requests;
use App\Poll;
use App\PollAnswer;
use App\Employee;
use Illuminate\Http\Request;
use Redirect;
use Auth;
use DB;
use Carbon\Carbon;
use App\Models\Notify;
use App\Models\Thread;

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
		$employees = Employee::all();
		return view('polls.addpoll', compact('employees'));
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

		$isAllEmployee = $request->input('all_employee');

		$employeeId = array();

		if ($isAllEmployee == 1) {

			$employees = Employee::all();

			$employeeId = array_map(function($value) {
				return $value['id'];
			}, $employees->toArray());

			$poll->employee()->sync($employeeId);

		} else {

			$employeeId = $request->input('poll_employee');

			$poll->employee()->sync($employeeId);

		}

		foreach ($employeeId as $valId) {
			Notify::create([
				'content' => Notify::$messages['vote'],
				'thread_id' => Thread::VOTE,
				'is_read' => Thread::UNREAD,
				'link' => route('showvote', $poll->id),
				'sent_to' => $valId,
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

			$employeeVotePoll = $poll->employee()->get();

			$employeeVotePollId = array_map(function($value) {
				return $value['id'];
			}, $employeeVotePoll->toArray());

			$employees = Employee::all();

			$isSelectFullEmployee = false;

			if (count($employeeVotePollId) == count($employees)) {

				$isSelectFullEmployee = true;

			}
			return view("polls.editpoll", compact('poll', 'answers', 'employees', 'employeeVotePollId', 'isSelectFullEmployee'));
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

			foreach ($request->answerid as $key => $value) {

				if($value == "0" && $request->answer[$key] != "") {

					PollAnswer::create([
						'poll_id' => $id,
						'answer' => $request->answer[$key],
						'order' => str_replace("#", "", $request->order[$key]),
						'color' => $request->color[$key],
					]);

				} else if ($value != "0" && $request->answer[$key] != "") {

					PollAnswer::find($value)->update([
						'answer' => $request->answer[$key],
						'order' => str_replace("#", "", $request->order[$key]),
						'color' => $request->color[$key],
					]);

				}
			}

			$isAllEmployee = $request->input('all_employee');
			$pollEmployee = $request->input('poll_employee');

			if ($isAllEmployee == 1) {

				$employees = Employee::all();

				$employeeId = array_map(function($value) {
					return $value['id'];
				}, $employees->toArray());

				$poll->employee()->sync($employeeId);

			} else if ($pollEmployee != null) {

				$poll->employee()->sync($pollEmployee);

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

			$poll->employee()->delete();

			$poll->delete();

		}
		return redirect()->route("polls.index")->with("messageOk", "Delete Poll Success");
	}

	private function convertCollectionToArrayId($arrCollect) {

		$arrId = array_map(function($value) {
					return $value['id'];
				}, $arrCollect->toArray());

		return $arrId;
	}

	/**
	 * Check user can vote this poll.
	 * @param  [type] $pollId [description]
	 * @return [type]         [description]
	 */
	public function checkCanVote($pollId) {

		$employeeCanVote = Poll::find($pollId)->employee()->get();

		$empId = $this->convertCollectionToArrayId($employeeCanVote);

		$empNowId = $this->getEmployeeCurrent()->id;

		if (in_array($empNowId, $empId)) {
			return true;
		}

		return false;
	}

	/**
	 * show vote
	 * @param  int $id [description]
	 * @return Response
	 */
	public function showvote($id) {

		$results = array();

		$checkUserCanVote = $this->checkCanVote($id);

		$results += array('checkUserCanVote' => $checkUserCanVote);

		$poll = Poll::find($id);

		$results += array('poll' => $poll);

		$employee_id = $this->getEmployeeCurrent()->id;

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
		$isShowResultAfterVote = $poll->show_results_req_vote;
		$results += array('isShowResultAfterVote' => $isShowResultAfterVote);

		// Check excess time to poll
	    $timeDeadline = Carbon::createFromFormat('Y-m-d H:i:s', $poll->end_date);
	    $checkExcessDeadline = false;

		$results += array('isShowResultAfterDealine' => $poll->show_results_finish);
    	$votechart = array();
		$checkExcessDeadline = ($dateCurrent >= $timeDeadline);
		$results += array('checkExcessDeadline' => $checkExcessDeadline);

		// check to dealine and is show result
	    if (($checkExcessDeadline) || ($isShowResultAfterVote)) {
				// if excess time, we can caculate answer percentage poll and show graph.
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
				->where('poll_user_answers.user_id',$employee_id)
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
					$pollanswer->attach(\Auth::user()->employee()->fisrt()->id);
				}
			}
		}
		return redirect(route('showvote',$id))->with('showResultAfterVote', true);
	}

}
