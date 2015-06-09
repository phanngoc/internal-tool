<?php namespace App\Http\Controllers;
use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\PositionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use App\Employee;
use App\Position;
use Illuminate\Support\Facades\Validator;
class PositionController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		return view('employee.listposition');
	}
	
	public function listposition() {
		$position=Position::all();
			$response = array();
		foreach ($position as $key => $value) {
			$item = array("id" => $value->id,
				"name" => $value->name,
				"description" => $value->description,	
			);

			array_push($response, $item);
		}
		return json_encode($response);
		

	}

	public function insert(){

		$position=new Position;

		$position->name=Request::input('name');
		$position->description=Request::input('description');
	    $validator = Validator::make(
		    ['name' => $position->name],
		    ['name' => ['required', 'min:5']]
		);


		if ($validator->fails())
		 {
	   //return  $validator->messages()->toJson();
		//return Response::json($validator->messages(), 400);
		
         if (Request::ajax())
            {
                return Response::json($validation->messages());
            }
		 }

		$position->save();
		echo json_encode($position);
	}


	public function updateposition(){

		$position= Position::find(Request::input('id'));
		   $position->update([
		'name' => Request::input('name'),
		'description' => Request::input('description')]);
		$item = array("id" => $position->id,
					 "name" => $position->name,
					"description" => $position->description);
		echo  json_encode($item);
	}

	public function destroy() {

		$position = Position::find(Request::input('id'));
		$position->delete();
		$item = array("id" => $position->id,
					 "name" => $position->name,
					"description" => $position->description);

		echo json_encode($item);
	}

}
