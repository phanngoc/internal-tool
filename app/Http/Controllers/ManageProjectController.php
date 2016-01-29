<?php

namespace App\Http\Controllers;

use App\FeatureProject;
use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use App\Employee;
use App\DetailFeature;
use Form;
use App\Project;
use App\CategoryFeature;
use App\StatusProject;
use App\Priority;
use DB;
use App\Models\CommentDetailFeature;
use Auth;
use View;
use Illuminate\Database\Eloquent\Collection;
use Input;
use Route;
use Paginator;

class ManageProjectController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request, $id = null) {
		$projects = Project::all();
		if ($id == null) {
			$id = Project::pluck('id');
		}
		$detailfeatures = array();
		$features = Project::find($id)->features()->get();
		$detailfeatures = new Collection();
		foreach ($features as $key_fea => $value_fea) {
			$detaiFeas = $value_fea->detailfeatures()->get();
			foreach ($detaiFeas as $key => $value) {
				$detailfeatures->add($value);
			//	array_push($detailfeatures,$value);
			}
		}

		$page = (Input::get('page') == NULL) ? 1 : Input::get('page');
		$path = $request->url;
		$count = $detailfeatures->count();
		$pagiDetailfeatures = new \Illuminate\Pagination\LengthAwarePaginator($detailfeatures,$count, 3, $page);
		$pagiDetailfeatures->setPath($path);
		$detailfeatures = $detailfeatures->slice($pagiDetailfeatures->firstItem()-1,3);

		return view('manageproject.manageproject',compact('projects','detailfeatures','pagiDetailfeatures'));
	}

	public function slideCollection($collec, $start, $end)
	{
		$items = new Collection();

	}
	/**
	 * Get employee are assigned to detail feature.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function api_getEmloyeeBelongDetailFeature($id)
	{
		$employees	= Employee::all();
		$results = array();
		foreach ($employees as $key => $value) {
			 $results += array($value->id => $value->lastname." ".$value->firstname);
		}
		$resultchoose = DetailFeature::find($id)->employees()->lists('id');

		echo Form::label('employee', 'Assigned to') ;
    echo Form::select('employee',$results,$resultchoose, ['class'=>'js-add-employee form-control','multiple'=>'true']);

	}

	/**
	 * Get all data from project.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function api_getTotalData($id)
	{
		$featureproject = FeatureProject::Where('project_id','=',$id)->get();
		$idq = 1;
		foreach ($featureproject as $feature_key => $feature_value) {
			$detailfeatures = $feature_value->detailfeatures()->get();

			unset($featureproject[$feature_key]->updated_at);
			unset($featureproject[$feature_key]->created_at);
			unset($featureproject[$feature_key]->description);
			$res_combile = array();

			foreach ($detailfeatures as $key => $value) {
				$employees = array();
				$employees = $value->employees()->lists('id');
				$item = array('id' => $value->id,
										  'idparent' => $idq,
										  'name' => $value->name,
										  'employees' => $employees,
						          'start' => $value->startdate,
						          'end' => $value->enddate);
				array_push($res_combile,$item);
			}
			$featureproject[$feature_key]->idfeature = $feature_value->id;
			$featureproject[$feature_key]->id = $idq;
			$featureproject[$feature_key]->series = $res_combile;
			$idq++;
		}

		$res_return = json_encode($featureproject);
		echo $res_return;
	}

	/**
	 * Save data edit from grantt chart
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function api_saveAll(Request $request)
	{
		$data = $request->input('data');
		print_r($data);
		foreach ($data as $key => $value) {

			$featureproject = FeatureProject::find($value['idfeature']);
			$featureproject->name = $value['name'];
			$featureproject->save();

			foreach ($value['series'] as $k_de => $v_de) {
				$featuredetail = DetailFeature::find($v_de['id']);
				$featuredetail->name = $v_de['name'];
				$featuredetail->startdate = $v_de['startServer'];
				$featuredetail->enddate = $v_de['endServer'];
				$featuredetail->save();
				if (array_key_exists('employees', $v_de)) {
					$featuredetail->employees()->sync($v_de['employees']);
				}
			}
		}
	}

	/**
	 * Edit detail feature.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function editDetailFeature($id) {
		$detailfeature = DetailFeature::find($id);
		$featureprojects = FeatureProject::all();
		$statusprojects = StatusProject::all();
		$categoryfeatures = CategoryFeature::all();
		$priorities = Priority::all();
		$employees = Employee::all();
		return view('manageproject.editdetailfeature',compact('detailfeature','featureprojects','statusprojects','categoryfeatures','priorities','employees'));
	}

	/**
	 * Update data detail feature
	 * @param  Request $request [description]
	 * @param  [type]  $id      [description]
	 * @return [type]           [description]
	 */
	public function updateDetailFeature(Request $request, $id) {
		$validator = DetailFeature::validate($request->all(),$id);
		if ($validator->fails()) {
			return redirect(route('manageproject.editDetailFeature',$id))->withErrors($validator)
                        ->withInput();
		} else {
			DetailFeature::find($id)->update($request->all());
			DetailFeature::find($id)->employees()->sync($request->input('employees'));
			return redirect(route('manageproject.editDetailFeature',$id));
		}
	}

	/**
	 * View create detail feature
	 * @return [type] [description]
	 */
	public function createDetailFeature() {
		$featureprojects = FeatureProject::all();
		$statusprojects = StatusProject::all();
		$categoryfeatures = CategoryFeature::all();
		$priorities = Priority::all();
		$employees = Employee::all();
		return view('manageproject.createdetailfeature',compact('featureprojects','statusprojects','categoryfeatures','priorities','employees'));
	}

	/**
	 * Post to create detail feature
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function postCreateDetailFeature(Request $request) {
		$validator = DetailFeature::validate($request->all());
		if ($validator->fails()) {
			return redirect(route('manageproject.createDetailFeature'))->withErrors($validator)
                        ->withInput();
		} else {
			$detailfeature = DetailFeature::create($request->all());
			$detailfeature->employees()->sync($request->input('employees'));
			return redirect(route('manageproject.index'));
		}
	}

	/**
	 * Delete detail feature.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function deleteDetailFeature($id) {
		$detailfeature = DetailFeature::find($id);
		$detailfeature->employees()->detach();
		$detailfeature->delete();
		return redirect()->route('manageproject.index')->with('messageOk', 'Delete detail feature successfully!');
	}

	/**
	 * [postCreateCommentDetailFeature description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function postCreateCommentDetailFeature(Request $request) {
		$employee = Auth::user()->employee()->get()[0];
		$commentDetailFeature = CommentDetailFeature::create(
			[
				'detail_feature_id' => $request->input('detailFeatureId'),
				'content' => $request->input('text'),
				'employee_id' => $employee->id,
			]
		);

		$view = view('manageproject.partial.block_comment')
					->with('employee', $employee)
					->with('commentDetailFeature',$commentDetailFeature);
		echo $view;
	}

	/**
	 * [postEditCommentDetailFeature description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function postEditCommentDetailFeature(Request $request) {
		$commentDeFea = CommentDetailFeature::find($request->input('detailFeatureId'));
		$commentDeFea->update([
			'content' => $request->input('val'),
		]);
	}

	/**
	 * Upload file in post comment detail feature.
	 * @param  Request $request [description]
	 * @return [string]           [description]
	 */
	public function uploadFileCommentDetailFeature(Request $request) {
		$fileUpload = $request->file('fileup');
		$newName = '';
		if ($fileUpload->isValid())
		{
			$extension = $fileUpload->getClientOriginalExtension();
			$newName = md5(strtotime("now")).'.'.$extension;
			$destinationPath = public_path().'/files/attach/';
		    $request->file('fileup')->move($destinationPath, $newName);
		}
		return '![GitHub Logo]('.route('files.attach',$newName).')';
	}

	/**
	 * [showFileAttach description]
	 * @return [type] [description]
	 */
	public function showFileAttach($filename) {
		$destinationPath = public_path().'/files/attach/'.$filename;
		if (File::exists($destinationPath))
		{
			return Response::make(readfile($destinationPath, 200)->header('Content-Type', 'image/png'));
		}
	}

	/**
	 * Delete comment detail feature.
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function deleteCommentDetailFeature($id) {
		try {
			CommentDetailFeature::findOrFail($id)->delete();
			return response()->json(['status' => 'ok']);
		} catch (ErrorException $e) {
			return response()->json(['status' => 'not']);
		}

	}
}
