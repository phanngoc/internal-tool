<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Employee;
use App\Hobby;
use App\Education;
use App\EmployeeSkill;
use App\WorkingExperience;
use App\Skill;
use App\AchievementAward;
use App\User;
use App\TakenProject;
use App\Nationality;
//use App\CategorySkill;



class PrintPreviewController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{	
		//$categoryskill = CategorySkill::find($id);
	
		//return view('printpreview.printpreview');
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		
		$takenproject= TakenProject::find($id);
		$employeeskill = EmployeeSkill::find($id);
		$national = Nationality::find($id);
		$user = User::find($id);
		$employee = Employee::find($id);
		$hobby = Hobby::find($id);
		$education = Education::find($id);
		$workingexperience = WorkingExperience::find($id);
		$skill = Skill::find($id);
		$achieve = AchievementAward::find($id);
		return view('printpreview.printpreview',compact('user','employeeskill','national','employee','hobby','education','workingexperience','skill','achieve'));
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
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
