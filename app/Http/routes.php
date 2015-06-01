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

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => ['mymiddleware']], function () {

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

            'uses' => 'GroupController@getPermission'

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
