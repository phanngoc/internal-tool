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
use Validator;

class ModalController extends AdminController {

	private $alias = array(
		'information_devices' => 'Information Devices',
		'type_devices' => 'Type Devices',
		'kind_devices' => 'Kind Devices',
		'category_feature' => 'Category Feature',
		'priority' => 'Priority',
		'featureproject' => 'Feature project',
		'statusprojects' => 'Status Project'
	);

	/**
	 * [filter_item_exclude description]
	 * @param  [type] $value [description]
	 * @return [type]        [description]
	 */
	public function filter_item_exclude($value) {
		if ($value->Field == 'created_at' || $value->Field == 'updated_at')
		{
			return false;
		}
		return true;
	}

	/**
	 * [index description]
	 * @return [type] [description]
	 */
	public function index($table) {
		$nameTable = $this->alias[$table];
		$columns = DB::select('SHOW COLUMNS FROM '.$table);
		$columns = array_filter($columns, array($this,'filter_item_exclude'));
		$res = DB::table($table)->get();
		return view('crud.index',compact('res', 'columns', 'nameTable'));
	}

	/**
	 * Put update data.
	 * @param  Request $request [description]
	 * @param  string  $table   [description]
	 * @return [type]           [description]
	 */
	public function update(Request $request,$table = '') {
		
		$columns = DB::select('SHOW COLUMNS FROM '.$table);
		$columns = array_filter($columns, array($this,'filter_item_exclude'));

		$rules = array();
		foreach ($columns as $key => $value) {
			$rules += array($value->Field => 'required');
		}

		$validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
        	$validator->errors()->add('iserror', 'true');
            return response()->json($validator->errors());
        }

		$id = $request->input('id');
		$vapush = $request->all();
		unset($vapush['id']);
		unset($vapush['_token']);
		DB::table($table)->where('id',$id)
			->update($vapush);
		return response()->json($request->all());
	}

	/**
	 * Post create data.
	 * @param  Request $request [description]
	 * @param  string  $table   [description]
	 * @return [type]           [description]
	 */
	public function store(Request $request,$table = '') {
		$vapush = $request->all();
		unset($vapush['id']);
		unset($vapush['_token']);
		DB::table($table)->insert($vapush);
		return response()->json($request->all());
	}

	/**
	 * Post save data.
	 * @param Request $request [description]
	 */
	public function destroy(Request $request,$table = '',$id) {
		DB::table($table)->where('id',$id)->delete();
		$idFirst = DB::table($table)->first()->id;
		DetailFeature::where($table.'_id',$id)->update([$table.'_id' => $idFirst]);
		return redirect(route('crud.index',$table));
	}
}
