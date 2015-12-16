<?php

namespace App\Http\Controllers;

use App\FeatureProject;
use App\Http\Requests\AddFeatureRequest;
use Illuminate\Http\Request;
use App\Employee;
use App\DetailFeature;
use Form;
use App\Project;
class ManageProjectController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
		$projects = Project::all();
		return view('manageproject.manageproject',compact('projects'));
	}

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

	public function api_getTotalData($id)
	{
		$featureproject = FeatureProject::Where('project_id','=',$id)->get();
		$idq = 1;
		foreach ($featureproject as $feature_key => $feature_value) {
			$detailfeatures = $feature_value->detailfeature()->get();

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
		// dd($featureproject);
		$res_return = json_encode($featureproject);
		echo $res_return;
	}
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
}
