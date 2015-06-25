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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
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

Route::group(['middleware' => ['mymiddleware']], function () {
	Route::resource('profiles', 'ProfileController');
	Route::resource('timesheets', 'TimesheetController');
	Route::resource('statusprojects', 'StatusProjectController');
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
	Route::resource('device', 'DeviceController');

	Route::get('device',
		[
			'as' => 'device',
			'uses' => 'DeviceController@index',
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
	Route::get('test', 'FeatureController@test');

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

});
