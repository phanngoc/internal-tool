<?php namespace App\Http\Controllers;
use App;
use App\Position;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class PositionController extends AdminController {

	/**
	 * Display a list position
	 *
	 * @return Response
	 */
	public function index() {
		return view('employee.listposition');
	}
	/**
	 * return json list position
	 */
	public function listposition() {
		$position = Position::all();
		$response = array();
		$number = 1;
		foreach ($position as $key => $value) {
			$item = array("id" => $number++,
				"name" => $value->name,
				"description" => $value->description,
			);

			array_push($response, $item);
		}
		return json_encode($response);

	}
	/**
	 * Insert position
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function insert() {

		$position = new Position;

		$position->name = Request::input('name');
		$position->description = Request::input('description');
		$validator = Validator::make(
			[
				'name' => $position->name,

			],
			[
				'name' => ['required']
			]
		);

		if ($validator->fails()) {
			//return  $validator->messages()->toJson();
			//return Response::json($validator->messages(), 400);

			if (Request::ajax()) {
				return "";
			}
		}

		$position->save();
		echo json_encode($position);
	}
	/**
	 * Update position
	 *
	 * @param  int  $id
	 * @return string
	 */

	public function updateposition() {
		$validator = Validator::make(
			[
				'name' => Request::input('name'),

			],
			[
				'name' => ['required']
			]
		);
		if ($validator->fails()) {
			//return  $validator->messages()->toJson();
			//return Response::json($validator->messages(), 400);

			if (Request::ajax()) {
				return "";
			}
		}
		$position = Position::find(Request::input('id'));
		$position->update([
			'name' => Request::input('name'),
			'description' => Request::input('description')]);
		$item = array("id" => $position->id,
			"name" => $position->name,
			"description" => $position->description);
		echo json_encode($position);
	}
	/**
	 * Remove position
	 *
	 * @param  int  $id
	 * @return string
	 */
	public function destroy() {

		$position = Position::find(Request::input('id'));
		$position->delete();
		$item = array("id" => $position->id,
			"name" => $position->name,
			"description" => $position->description);

		echo json_encode($item);
	}

}
