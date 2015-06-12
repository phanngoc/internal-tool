<?php namespace App\Http\Controllers;
use App\Group;
use App\Language;
use App\Module;
use Auth;
use Route;

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
	public function sidebar() {
		$groupall = Auth::user()->group()->get();
		$listfeaturegroup = array();
		foreach ($groupall as $key => $value) {
			$feature = Group::find($value->id)->feature()->get();
			foreach ($feature as $key_fea => $val_fea) {
				array_push($listfeaturegroup, $val_fea->url_action);
			}
		}

		$module_array = Module::all();
		$menu = "";
		foreach ($module_array as $key => $value) {
			$ul = "";
			$features = $value->feature;
			foreach ($features as $feature) {
				if ($feature->is_menu == 1 && in_array($feature->url_action, $listfeaturegroup)) {
					$fj = json_decode($feature->url_action);
					if ($fj == NULL) {
						if (Route::has($feature->url_action)) {
							$ul .= "<li><a href='" . route($feature->url_action) . "'><i class=''></i>$feature->name_feature</a></li>";
						}
					} else {
						if (Route::has($fj[0])) {
							$ul .= "<li><a href='" . route($fj[0]) . "'><i class=''></i>$feature->name_feature</a></li>";
						}

					}
				}

			}
			if ($ul != "") {
				$ul = "<li class='treeview'>
			<a href='#'>
			<i class=''></i> <span>$value->name</span> <i class='fa fa-angle-left pull-right'></i>
			</a>
			<ul class='treeview-menu'>
			$ul
			</ul>
			</li>";
			}
			$menu = $menu . $ul;

		}

		return $menu;

	}
}