<?php namespace App\Http\Controllers;

use App;
use App\Education;
use App\Employee;
use App\EmployeeSkill;
use App\Http\Requests\AddEditEmployeeRequest;
use App\Nationality;
use App\Position;
use App\Skill;
use App\TakenProject;
use App\User;
use App\WorkingExperience;
use Auth;
use File;
use Illuminate\Support\Facades\Redirect;
use Request;

class ProfileController extends AdminController {

	/*Direct to user homepage*/
	public function index() {
		/*VIEW INFORMATION NGOC USER*/
		$positions = Position::all();
		$employee = Auth::user()->employee()->get()->first();

		$educations = Education::where('employee_id', '=', $employee->id)->get();
		$employee->date_of_birth = $this->convert_datetimesql_to_datepicker($employee->date_of_birth);

		$nationalities = Nationality::all();

		/*VIEW INFORMATION WORKING EXPERIENCE - VU*/
		$skill = array("-1" => "None") + Skill::lists('skill', 'id');
		$experiences = $employee->working_experience;
		$employee_skills = EmployeeSkill::where('employee_id', '=', $employee->id)->get();
		//dd(json_encode($employee_skills));
		$experiences = WorkingExperience::where('employee_id', '=', $employee->id)->get();

		/*VIEW INFORMATION TAKEN PROJECT - VU*/
		$taken_projects = TakenProject::where('employee_id', '=', $employee->id)->get();

		return View('profiles.profiles', compact('positions', 'employee', 'experiences', 'nationalities', 'educations', 'employee_skills', 'skill', 'taken_projects'));
	}

	/**
	 * @param $date
	 * @return mixed
	 */
	public function convert_datetimesql_to_datepicker($date) {
		$year = substr($date, 0, 4);
		$month = substr($date, 5, 2);
		$day = substr($date, 8, 2);
		$res = $month . "/" . $day . "/" . $year;
		return $res;
	}

	public function convert_datepicker_to_datetimesql($date) {
		$month = substr($date, 0, 2);
		$day = substr($date, 3, 2);
		$year = substr($date, 6, 4);
		$mysqltime = date("Y-m-d H:i:s", strtotime($year . "-" . $month . "-" . $day));
		return $mysqltime;
	}

	/*Process add user to database*/
	public function store(AddEditEmployeeRequest $request) {
		$positions = Position::all();
		$employee = Auth::user()->employee()->get()->first();
		$img = $request->imageup;
		$requestdata = $request->all();
		$requestdata['dateofbirth'] = $this->convert_datepicker_to_datetimesql(Request::input('dateofbirth'));

		if ($img != "") {
			$requestdata['avatar'] = 'avatar/' . $requestdata['avatar'];
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);
			$data = base64_decode($img);
			$file = public_path() . "/avatar/" . $request->avatar;
			$bytes_written = File::put($file, $data);
		}

		// $employee_save = Employee::find($employee->id);
		// $employee_save->firstname = Request::input('firstname');
		// $firstname = Request::input('firstname');
		// $lastname = Request::input('lastname');
		// $employee_code = Request::input('employee_code');
		// $phone = Request::input('phone');
		// $position = Request::input('position');
		// $nationality = Request::input('nationality');
		// $career_objective = Request::input('career_objective');
		// $address = Request::input('address');
		// $gender = Request::input('gender');
		// $dateofbirth = $this->convert_datepicker_to_datetimesql(Request::input('dateofbirth'));
		// $hobbies = Request::input('hobby');
		// $achievementAward = Request::input('achievement_award');
		$employee->update($requestdata);

		$educations = Education::where('employee_id', '=', $employee->id)->get();
		$employee->date_of_birth = $this->convert_datetimesql_to_datepicker($employee->date_of_birth);

		foreach ($educations as $k_edu => $k_val) {
			$yearstart = Request::input($k_val->id . 'edu_yearstart');
			if ($yearstart == null) {
				Education::destroy($k_val->id);
				continue;
			}
			$yearend = Request::input($k_val->id . 'edu_yearend');
			$description = Request::input($k_val->id . 'edu_description');
			$certificate = Request::input($k_val->id . 'certificate');
			$edu = Education::find($k_val->id);
			$edu->update([
				'year_start' => $yearstart,
				'year_end' => $yearend,
				'description' => $description,
				'certificate' => $certificate,
			]);
		}

		$yearstart_new = Request::input('edu_yearstart');
		$yearend_new = Request::input('edu_yearend');
		$description_new = Request::input('edu_description');
		$certificate_new = Request::input('certificate');
		if ($yearstart_new != null) {
			foreach ($yearstart_new as $k_n => $v_n) {
				$user = Education::create(array(
					'employee_id' => $employee->id,
					'year_start' => $yearstart_new[$k_n],
					'year_end' => $yearend_new[$k_n],
					'description' => $description_new[$k_n],
					'certificate' => $certificate_new[$k_n],
				));
			}
		}
		/*$experiences = $employee->working_experience;*/
		$educations = Education::where('employee_id', '=', $employee->id)->get();
		$nationalities = Nationality::all();

		/*$experiences = $employee->working_experience;*/
		//return View('profiles.profiles', compact('positions', 'employee', 'educations', 'nationalities');

		//$experiences = $employee->working_experience;

		/*STORE WORKING EXPERIENCE*/
		$working = new WorkingExperience();
		$

		/*STORE SKILLS*/

		return View('profiles.profiles', compact('positions', 'employee', 'educations', 'nationalities', 'experiences'));
	}

	/*Direct to add user page*/
	public function create() {
		$groups = Group::lists('groupname', 'id');
		return view('users.adduser', compact('groups'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$user = User::find($id);
		$groups = Group::lists('groupname', 'id');
		$groupssl = $user->group->lists('id');

		//dd($groupssl);
		if (is_null($user)) {
			return redirect()->route('users.index');
		}
		return View('users.edituser', compact('user', 'groups', 'groupssl'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, EditUserRequest $request) {
		//$a = new User();
		$user = User::find($id);
		$user->update([
			'fullname' => $request->get('fullname'),
			'email' => $request->get('email')]);
		$user->attachGroup($request['group_id']);
		return redirect()->route('users.index')->with('messageOk', 'user update successfully');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {

		$users = User::find($id);
		$users->group()->detach();
		$users->delete();
		return redirect()->route('users.index');

	}

}
