<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use App\Employee;
use App\Position;

class EmployeeController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		return view('employee.listemployee');
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
        ]);
		$employee->user()->update(['email'=>$request->input('email')]);
		//$user->attachGroup($request['group_id']);
		$item = array("id" => $employee->id, 
			 		  "firstname" => $request->input('firstname'),
                      "lastname" =>$request->input('lastname'),
                      "phone" => $request->input('phone'),
            		  "position" => Position::find($request->input('position')),
            		  'email'=> $request->input('email'),
            		  'employee_code' => $request->input('employee_code')
            		 );

        echo json_encode($item);
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create() {
		$module = Module::all();
		$feature = Feature::all();

		return view('features.addfeature', compact('module', 'feature'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(AddFeatureRequest $request) {

		$feature = new FeatureNode();
		$feature->module_id = $request['id_module'];
		$feature->name_feature = $request['name_feature'];
		$feature->description = $request['description'];
		$feature->url_action = $request['action'];
		$feature->parent_id = $request['id_parent'];

		// dd($feature->description);
		// $module = Module::find($feature->module_id);
		// $features = $module->feature()->save($feature);
		// create relation
		// $nodenew = FeatureNode::find($feature->id);
		$data = array();
		$data['module_id'] = $request['id_module'];
		$data['name_feature'] = $request['name_feature'];
		$data['description'] = $request['description'];
		$data['url_action'] = $request['action'];
		$data['parent_id'] = $request['id_parent'];
		$feature = null;
		if ($request['id_parent'] != 0) {
			$nodeparent = FeatureNode::find($request['id_parent']);
			$feature = FeatureNode::create($data, $nodeparent);

			// $nodeparent->children()->create($data);
			// $nodenew->appendTo($nodeparent)->save();
			// $nodenew->parent()->associate($data)->save();
		} else {
			$feature = FeatureNode::create($data);
			// $nodenew->makeRoot()->save();
			// $feature->save();
			// $feature->makeRoot()->save();
		}
		return redirect()->route('features.index')->with('messageOk', ' Add successfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) {
		$feature = Feature::find($id);
		$features = Feature::all();


		$modules = Module::all();

		if (is_null($feature)) {
			return redirect()->route('features.listfeature');
		}

		return View('features.editfeature', compact('feature', 'features', 'modules'));
	}

	public function postFeature() {
		$id = isset($_GET['id']) ? (int) $_GET['id'] : false;
		$features = Feature::where('module_id', '=', $id)->get();
		$data = array();
		foreach ($features as $key => $value) {
			$item = array("id" => $value->id, "name" => $value->name_feature);
			array_push($data, $item);
		}
		echo json_encode($data);
		//return View('features.addfeature', compact('feature'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request) {

		$feature = Feature::find($id);
		$feature->update([
			'name_feature' => $request['feature_name'],
			'description' => $request['description'],
			'url_action' => $request['action'],
			'parent_id' => $request['parent_id'],
			'module_id' => $request['module_id'],
		]);

		$feature->attachGroup($request['group_id']);

		$nodenew = FeatureNode::find($id);
		if ($request['parent_id'] != 0) {
			$nodeparent = FeatureNode::find($request['parent_id']);
			$nodenew->appendTo($nodeparent)->save();
		} else {
			$nodenew->saveAsRoot();
		}
		return redirect()->route('features.index')->with('messageOk', 'user update successfully');
	}

	public function test() {
		$items = FeatureNode::hasChildren()->get();
		$items->linkNodes();
		dd($items);
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id) {
		$feature = FeatureNode::find($id);
		//$feature->module()->detach();
		$feature->delete();
		return redirect()->route('features.index');
	}

}
