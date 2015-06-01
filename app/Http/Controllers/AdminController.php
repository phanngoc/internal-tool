<?php namespace App\Http\Controllers;
use App\Language;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function __construct() {
		$language = Language::where('is_default', '=', 1)->first();
		if ($language == null) {
			\App::setLocale('en');
		} else {
			\App::setLocale($language->code);
		}
	}
}