<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use App\Group;
class PageController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {

		return view('index');
	}

}
