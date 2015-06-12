<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use App\Employee;
use App\Position;
use Validator;
use App\User;

class EmployeeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$employees = Employee::all();
		foreach ($employees as $key => $value) {
			$employees[$key]['position_name'] = Position::find($value->position_id)->name;
		}
		return view('employee.listemployee',compact('employees'));
	}

	public function api_listposition()
	{
		$positions = Position::all();
		$responses = array();
		foreach ($positions as $key => $value) {
			$item = array(
				'id' => $value->id,
				'name' => $value->name,
				'description' => $value->description
				);
			array_push($responses,$item);
		}
		echo json_encode($responses);
	}

	public function api_listuser()
	{
		$users = User::all();
		$responses = array();
		foreach ($users as $key => $value) {
			$item = array(
				'id' => $value->id,
				'fullname' => $value->fullname,
				);
			array_push($responses,$item);
		}
		echo json_encode($responses);
	}

	public function api_showemployee()
	{
		$employees = Employee::all();
		$response = array();
		foreach ($employees as $kem => $valem) {
			$item = array(  
							"id" => $valem->id, 
				 			"firstname" => $valem->firstname,
                            "lastname" => $valem->lastname,
                            "phone"=> $valem->phone,
                            "employee_code" => $valem->employee_code
                         );
			//dd($valem->user());
			$item += array('position' => $valem->position()->get()->first());
			$item += array('email' => $valem->user()->get()->first()->email);
			array_push($response, $item);
		}
		echo json_encode($response);
	}

	public function api_updateemployee(Request $request)
	{
				//$a = new User();
		$employee = Employee::find($request->input('id'));

		$validator = Validator::make(
		    [
		      'firstname' => $request->input('firstname'),
		      'lastname' =>  $request->input('lastname'),
              'phone' => $request->input('phone'),
              'position_id' => $request->input('position'),
              'employee_code' => $request->input('employee_code'),
              'email'=>$request->input('email'),
		    ]
		    ,[
		      'firstname' => ['required'],
		      'lastname' => ['required'],
		      'phone' => ['required','digits_between:6,15'],
		      'position_id' => ['required','digits_between:1,15'],
		      'employee_code' => ['required'],
		      'email' => ['required','email'],
		    ]
		);

		if ($validator->fails())
		{
		   return  "ok";
		}

		$employee->update([
			'firstname' => $request->input('firstname'),
			'lastname' =>  $request->input('lastname'),
            'phone' => $request->input('phone'),
            'position_id' => $request->input('position'),
            'employee_code' => $request->input('employee_code'),
        ]);
		$employee->user()->update(['email'=>$request->input('email')]);
		//$user->attachGroup($request['group_id']);
		$item = array("id" => $request->input('id'), 
			 		  "firstname" => $request->input('firstname'),
                      "lastname" =>$request->input('lastname'),
                      "phone" => $request->input('phone'),
            		  "position" => Position::find($request->input('position')),
            		  'email'=> $request->input('email'),
            		  'employee_code' => $request->input('employee_code')
            		 );

        echo json_encode($item);
	}


	public function api_deleteemployee(Request $request)
	{
		$employee = Employee::find($request->input('id'));
		$employee->delete();
		$item = array("id" => $request->input('id'), 
			 		  "firstname" => $request->input('firstname'),
                      "lastname" =>$request->input('lastname'),
                      "phone" => $request->input('phone'),
            		  "position" => Position::find($request->input('position')),
            		  'email'=> $request->input('email'),
            		  'employee_code' => $request->input('employee_code')
            		 );
		// $item = array("id" => $user->id, "fullname" => $user->fullname,
  //                           "username"=>$user->username,
  //                           "email"=> $user->email);
  		echo json_encode($item);
	}

	public function api_addemployee(Request $request)
	{

		$employee = Employee::create([
			'firstname' => $request->input('firstname'),
			'lastname' =>  $request->input('lastname'),
            'phone' => $request->input('phone'),
            'position_id' => $request->input('position'),
            'employee_code' => $request->input('employee_code'),
            'user_id' => $request->input('user_id')
        ]);
//		$employee->user()->update(['email'=>$request->input('email')]);

		// $item = array("id" => $employee->id, 
		// 	 		  "firstname" => $request->input('firstname'),
  //                     "lastname" =>$request->input('lastname'),
  //                     "phone" => $request->input('phone'),
  //           		  "position" => Position::find($request->input('position')),
  //           		  'email'=> $request->input('email'),
  //           		  'employee_code' => $request->input('employee_code')
  //           		 );

  //       echo json_encode($item);
	}


}
