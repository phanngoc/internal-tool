<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
 */

/*
Homepage = Dashboard
 */

if (Config::get('database.log', false)) {
	Event::listen('illuminate.query', function ($query, $bindings, $time, $name) {
		$data = compact('bindings', 'time', 'name');

		// Format binding data for sql insertion
		foreach ($bindings as $i => $binding) {
			if ($binding instanceof \DateTime) {
				$bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
			} else if (is_string($binding)) {
				$bindings[$i] = "'$binding'";
			}
		}

		// Insert bindings into query
		$query = str_replace(array('%', '?'), array('%%', '%s'), $query);
		$query = vsprintf($query, $bindings);

		Log::info($query, $data);
	});
}
Route::get('events', [
	'as' => 'events.index',
	'uses' => 'EventController@index',
]);

Route::post('events', [
	'as' => 'events.store',
	'uses' => 'EventController@store',
]);

Route::get('downloadAll/{id}', function ($id) {
	// Check if file exists in app/storage/file folder
	$file_path = public_path() . '/files/' . $id . '/All.zip';
	if (file_exists($file_path)) {
		// Send Download
		return Response::download($file_path, 'All.zip', [
			'Content-Length: ' . filesize($file_path),
		]);
	} else {
		// Error
		exit('Requested file does not exist on our server!');
	}
})
	->where('filename', '[A-Za-z0-9\-\_\.]+');

Route::get('download/{id}/{filename}', function ($id, $filename) {
	// Check if file exists in app/storage/file folder
	$file_path = public_path() . '/files/' . $id . '/' . $filename;
	if (file_exists($file_path)) {
		// Send Download
		return Response::download($file_path, $filename, [
			'Content-Length: ' . filesize($file_path),
		]);
	} else {
		// Error
		exit('Requested file does not exist on our server!');
	}
});
// ->where('filename', '[A-Za-z0-9\-\_\.]+');

Route::get('zipfile/{id}', [
	'as' => 'zipfile',
	'uses' => 'CandidateController@zipfile',
]);

Route::get('statusrecord/destroy/{id}', [
	'as' => 'statusrecord.destroy',
	'uses' => 'StatusRecordController@destroy',
]);

Route::post('statusrecord/destroy/{id}', [
	'as' => 'statusrecord.destroy',
	'uses' => 'StatusRecordController@destroy',
]);

Route::post('statusrecord.savecreate', [
	'as' => 'statusrecord.savecreate',
	'uses' => 'StatusRecordController@savecreate',
]);

Route::post('statusrecord.saveedit', [
	'as' => 'statusrecord.saveedit',
	'uses' => 'StatusRecordController@saveedit',
]);

Route::get('statusrecord/create', [
	'as' => 'statusrecord.create',
	'uses' => 'StatusRecordController@create',
]);

Route::get('statusrecord', [
	'as' => 'statusrecord',
	'uses' => 'StatusRecordController@index',
]);

// Route::post('savenotestatus', [
// 	'as' => 'savenotestatus',
// 	'uses' => 'NoteStatusController@save',
// ]);

// Route::get('notestatus', [
// 	'as' => 'notestatus',
// 	'uses' => 'NoteStatusController@index',
// ]);

Route::post('saveinterviewschedule', [
	'as' => 'saveinterviewschedule',
	'uses' => 'InterviewController@save',
]);

Route::get('interview', [
	'as' => 'candidate.interview',
	'uses' => 'InterviewController@index',
]);

Route::get('employee.export', [
	'as' => 'exportemployee',
	'uses' => 'EmployeeController@exportExcel',
]);

Route::get('employee.import', [
	'as' => 'importemployee',
	'uses' => 'EmployeeController@importExcel',
]);
Route::get('device.export', [
	'as' => 'exportdevice',
	'uses' => 'DeviceController@exportExcel',
]);
Route::POST('auth/secure', [
	'as' => 'auth.secure',
	'uses' => 'Auth\AuthController@postSecure',
]);
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('overviewfilter', [
	'as' => 'filterdevice',
	'uses' => 'OverviewController@filter',
]);

Route::get('modeldevice', [
	'as' => 'post-typedevice',
	'uses' => 'OverviewController@postTypeDevice',
]);

Route::get('kinddevice', [
	'as' => 'post-modeldevice',
	'uses' => 'OverviewController@postModelDevice',
]);

Route::get('print',
	[
		'as' => 'print.index',
		'uses' => 'PrintController@index',
	]);
Route::resource('printpreview', 'PrintPreviewController');
Route::get('print/{id}',
	[
		'as' => 'print.show',
		'uses' => 'PrintController@show',
	]);
Route::get('printpreview/{id}',
	[
		'as' => "printpreview.show",
		'uses' => 'PrintPreviewController@show',
	]);

Route::get('admin/sidebar',
	[
		'as' => 'admin.sidebar',
		'uses' => 'AdminController@sidebar',
	]);
/*---------------------------Data process------------------------------*/

Route::get('crud/{table}', [
	'as' => 'crud.index',
	'uses' => 'ModalController@index',
]);

Route::post('crud/{table}/store', [
	'as' => 'crud.store',
	'uses' => 'ModalController@store',
]);

Route::post('crud/{table}/update', [
	'as' => 'crud.update',
	'uses' => 'ModalController@update',
]);

Route::delete('crud/{table}/{id}/delete', [
	'as' => 'crud.destroy',
	'uses' => 'ModalController@destroy',
]);

Route::get('clicknofify/{id}', [
	'as' => 'clicknofify',
	'uses' => 'AdminController@redirectAfterClickNotify',
]);


Route::group(['middleware' => ['mymiddleware']], function () {
	Route::resource('polls', 'PollController');
	Route::get('vote/{id}', ['as'=> 'showvote','uses'=>'PollController@showvote']);
	Route::post('vote/{id}', ['as'=> 'savevote','uses'=>'PollController@vote']);
	Route::resource('profiles', 'ProfileController');
	Route::get('borrowdevice', [
		'as' => 'borrowdevice',
		'uses' => 'BorrowController@index',
	]);

	Route::post('saveborrowdevice', [
		'as' => 'saveborrowdevice',
		'uses' => 'BorrowController@save',
	]);
	Route::resource('candidates', 'CandidateController');
	Route::resource('typedevices', 'TypeDeviceController');
	Route::resource('modeldevices', 'ModelDeviceController');
	Route::resource('kinddevices', 'KindDeviceController');
	Route::resource('statusdevices', 'StatusDeviceController');
	Route::resource('informationdevices', 'InformationDeviceController');
	Route::resource('operatingsystems', 'OperatingSystemController');
	Route::get('print',
		[
			'as' => 'print.index',
			'uses' => 'PrintController@index',
		]);
	Route::resource('printpreview', 'PrintPreviewController');
	Route::get('print/{id}',
		[
			'as' => 'print.show',
			'uses' => 'PrintController@show',
		]);
	Route::get('printpreview/{id}',
		[
			'as' => "printpreview.show",
			'uses' => 'PrintPreviewController@show',
		]);
	Route::get('employee.export', [
		'as' => 'exportemployee',
		'uses' => 'EmployeeController@exportExcel',
	]);
	Route::resource('timesheets', 'TimesheetController');
	Route::resource('statusprojects', 'StatusProjectController');
	Route::resource('skills', 'SkillController');
	Route::resource('categoryskills', 'CategorySkillController');

	Route::get('employee/editmore/{id}',
		[
			'as' => "employee.editmore",
			'uses' => 'EmployeeController@editmore',
		]);
	Route::post('employee/editmore/{id}/store',
		[
			'as' => "employee.editmore.store",
			'uses' => 'EmployeeController@editmorestore',
		]);
	Route::get('employee/delete/{id}',
		[
			'as' => "employee.delete",
			'uses' => 'EmployeeController@delete',
		]);
	Route::get('ajax.getUser',
		[
			'as' => 'ajax.getUser',
			'uses' => 'EmployeeController@api_listuser',
		]);

	Route::get('position',
		[
			'as' => 'position.index',
			'uses' => 'PositionController@index',
		]);

	Route::get('position.list',
		[
			'as' => 'position.list',
			'uses' => 'PositionController@listposition',
		]);
	Route::post('positionupdate',
		[
			'as' => 'positionupdate',
			'uses' => 'PositionController@updateposition',
		]);
	Route::post('positioninsert',
		[
			'as' => 'positioninsert',
			'uses' => 'PositionController@insert',
		]);
	Route::post('position.destroy',
		[
			'as' => 'position.destroy',
			'uses' => 'PositionController@destroy',
		]);
	Route::resource('devices', 'DeviceController');
	Route::resource('overview', 'OverviewController');

	Route::get('devices/delete/{id}',
		[
			'as' => "devices.delete",
			'uses' => 'deviceController@delete',
		]);

	Route::resource('employee', 'EmployeeController');

	Route::get('employee',
		[
			'as' => 'employee',
			'uses' => 'EmployeeController@index',
		]);

	Route::get('employee.show',
		[
			'as' => 'showemployee',
			'uses' => 'EmployeeController@api_showemployee',
		]);
	Route::get('employee.listposition',
		[
			'as' => 'listposition',
			'uses' => 'EmployeeController@api_listposition',
		]);
	Route::post('employee.update',
		[
			'as' => 'updateemployee',
			'uses' => 'EmployeeController@api_updateemployee',
		]);
	Route::post('employee.delete',
		[
			'as' => 'deleteemployee',
			'uses' => 'EmployeeController@api_deleteemployee',
		]);
	Route::post('employee.add',
		[
			'as' => 'addemployee',
			'uses' => 'EmployeeController@api_addemployee',
		]);

	Route::get('items.index', ['as' => 'itemindex', 'uses' => 'ProjectController@view']);

	Route::post('items.update', [
		'as' => 'itemupdate',
		'uses' => 'ProjectController@update',
	]);

	Route::post('items.delete', [
		'as' => 'itemdelete',
		'uses' => 'ProjectController@destroy',
	]);
	Route::post('adduser', [
		'as' => 'adduser',
		'uses' => 'userController@add',
	]);

	/*--------- Project --------------*/

	//route::get('projects', 'ProjectController@index');
	Route::get('projects/getteam/{id}', [
		'as' => 'projects.getteam',
		'uses' => 'ProjectController@getTeam']);

	Route::get('projects/getusers/{id}', [
		'as' => 'projects.getusers',
		'uses' => 'ProjectController@getUsers']);
	Route::get('projects/getstatus', [
		'as' => 'projects.getstatus',
		'uses' => 'ProjectController@getStatus']);
	Route::get('projects/getgroups', [
		'as' => 'projects.getgroups',
		'uses' => 'ProjectController@getGroups']);
	Route::POST('projects/team', [
		'as' => 'projects.team',
		'uses' => 'ProjectController@storeTeam']);
	Route::PUT('projects/team/{id}', [
		'as' => 'projects.team',
		'uses' => 'ProjectController@updateTeam']);
	Route::DELETE('projects/team/{id}', [
		'as' => 'projects.team',
		'uses' => 'ProjectController@destroyTeam']);
	Route::resource('projects', 'ProjectController');

	/*--------- End Project --------------*/

	Route::get('/', [
		'as' => 'index',
		'uses' => 'PageController@index',
	]);

	Route::get('configures', [
		'as' => 'configures.index',
		'uses' => 'ConfigureController@index']);

	Route::post('configures/update', [
		'as' => 'configures.update',
		'uses' => 'ConfigureController@update']);

	Route::resource('users', 'UserController');
	Route::resource('groups', 'GroupController');

	Route::get('groups/{id}/permission', array(

		'as' => 'groups.permission',

		'uses' => 'GroupController@getPermission',

	));

	Route::post('groups/{id}/permission', array(

		'as' => 'groups.permission',

		'uses' => 'GroupController@postPermission',

	));

	Route::resource('features', 'FeatureController');
	Route::resource('modules', 'ModuleController');
	Route::get('showtree/{id}', 'ModuleController@showtree');
	Route::get('parent', [
		'as' => 'post-parent',
		'uses' => 'FeatureController@postFeature']);
	Route::get('languages', [
		'as' => 'languages.index',
		'uses' => 'LanguagesController@index']);

	Route::get('languages/{id}', [
		'as' => 'languages.change',
		'uses' => 'LanguagesController@change']);

	Route::get('translate', [
		'as' => 'translate.index',
		'uses' => 'TranslateController@index']);

	Route::post('translate', [
		'as' => 'translate.update',
		'uses' => 'TranslateController@update']);

	Route::resource('calendars','CalendarController');

	/*----------------Manageproject-----------------*/
	Route::post('manageproject/saveAll', [
		'as' => 'manageproject.saveAll',
		'uses' => 'ManageProjectController@api_saveAll',
	]);

	Route::get('manageproject/getEmployee/{id}', [
		'as' => 'manageproject.getEmployee',
		'uses' => 'ManageProjectController@api_getEmloyeeBelongDetailFeature',
	]);

	Route::get('manageproject/getTotalData/{id}', [
		'as' => 'manageproject.getTotalData',
		'uses' => 'ManageProjectController@api_getTotalData',
	]);

	Route::get('manageproject/{id?}', [
		'as' => 'manageproject.index',
		'uses' => 'ManageProjectController@index',
	]);

	Route::get('manageproject/create/detailfeature', [
		'as' => 'manageproject.createDetailFeature',
		'uses' => 'ManageProjectController@createDetailFeature',
	]);

	Route::post('manageproject/postCreateDetailFeature', [
		'as' => 'manageproject.postCreateDetailFeature',
		'uses' => 'ManageProjectController@postCreateDetailFeature',
	]);

	Route::get('manageproject/edit/{detailFeatureId}', [
		'as' => 'manageproject.editDetailFeature',
		'uses' => 'ManageProjectController@editDetailFeature',
	]);

	Route::put('manageproject/edit/{detailFeatureId}', [
		'as' => 'manageproject.postEditDetailFeature',
		'uses' => 'ManageProjectController@updateDetailFeature',
	]);

	Route::delete('manageproject/delete/{detailFeatureId}', [
		'as' => 'manageproject.deleteDetailFeature',
		'uses' => 'ManageProjectController@deleteDetailFeature',
	]);

	Route::post('manageproject/postCreateCommentDetailFeature', [
		'as' => 'manageproject.postCreateCommentDetailFeature',
		'uses' => 'ManageProjectController@postCreateCommentDetailFeature',
	]);

	Route::post('manageproject/postEditCommentDetailFeature', [
		'as' => 'manageproject.postEditCommentDetailFeature',
		'uses' => 'ManageProjectController@postEditCommentDetailFeature',
	]);

	Route::post('manageproject/uploadFileCommentDetailFeature', [
		'as' => 'manageproject.uploadFileCommentDetailFeature',
		'uses' => 'ManageProjectController@uploadFileCommentDetailFeature',
	]);

	Route::get('files/attach/{name}', [
		'as' => 'files.attach',
		'uses' => 'ManageProjectController@showFileAttach',
	]);

	Route::post('manageproject/deleteCommentDetailFeature/{id}', [
		'as' => 'manageproject.deleteCommentDetailFeature',
		'uses' => 'ManageProjectController@deleteCommentDetailFeature',
	]);

	/*-------------------Calendar----------------------------------*/

	Route::resource('calendars','CalendarController',['only' => ['index']]);

	Route::get('calendar/refresh/{month}/{year}',
				['as'=>'calendar.refresh',
				'uses'=> 'CalendarController@api_getTable'
	]);

	/* end me edit */
	Route::post('calendar/save/{month}/{year}',
				['as'=>'calendar.savecalendar',
				'uses'=> 'CalendarController@api_saveData'
	]);

	Route::get('calendar/absent/{employee_id?}/{year?}',
				['as'=>'calendar.getAbsenceInYear',
				'uses'=> 'CalendarController@getAbsenceInYear'
	]);

	Route::get('calendar/edit-holiday',
				['as'=>'calendar.editHoliday',
				'uses'=> 'CalendarController@editHoliday'
	]);

	Route::post('calendar/edit-holiday',
				['as'=>'calendar.postEditHoliday',
				'uses'=> 'CalendarController@postEditHoliday'
	]);
	/*--------------------------------------------------------------*/

});
