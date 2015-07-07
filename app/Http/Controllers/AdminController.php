<?php namespace App\Http\Controllers;
use App\Group;
use App\Language;
use Auth;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public $listfeaturegroup = array();
	public $check_feature = array();
	public function __construct() {
		$language = Language::where('is_default', '=', 1)->first();
		if ($language == null) {
			\App::setLocale('en');
		} else {
			\App::setLocale($language->code);
		}
		$this->getFeatureGroup();
		//$d = $this->sidebar();

	}

	public function getFeatureGroup() {
		$groupall = Auth::user()->group()->get();
		foreach ($groupall as $key => $value) {
			$feature = Group::find($value->id)->feature()->get();
			foreach ($feature as $key_fea => $val_fea) {
				array_push($this->listfeaturegroup, array($val_fea->id => $val_fea->url_action));
			}
		}
	}

	/*public function createParent($arrparent, $id, $url, $name) {
$str = "";
$features = \App\Feature::where('parent_id', '=', $id)->get();
array_push($this->check_feature, $id);
if (count($features) > 0) {
$str = "<li class='treeview'><a href='$url'><i class=''></i> $name <i class='fa fa-angle-left pull-right'></i></a>
<ul class='treeview-menu'>";
$newstr = "";
$number = 0;
foreach ($features as $feature) {
if ($feature->is_menu == 1 && in_array(array($feature->id => $feature->url_action), $this->listfeaturegroup) && !in_array($feature->id, $this->check_feature)) {
$number++;
array_push($this->check_feature, $feature->id);
$fj = json_decode($feature->url_action);
$link = "";
if ($fj == NULL) {
$link = route($feature->url_action);
} else {
$link = route($fj[0]);
}
$newstr .= $this->createParent($arrparent, $feature->id, $link, $feature->name_feature);
}
}
if ($number == 1) {
$str = $newstr;
} else
if ($newstr == "") {
$str = "<li><a href='$url'><i class=''></i>$name</a></li>";
} else {
$str .= $newstr . "</ul></li>";
}
} else {
$str = "<li><a href='$url'><i class=''></i>$name</a></li>";
}

return $str;
}

public function sidebar() {
$module_array = Module::orderBy('order', 'ASC')->get();
$menu = "";
foreach ($module_array as $key => $value) {
$ul = "";
foreach ($value->feature as $feature) {
if ($feature->is_menu == 1 && in_array(array($feature->id => $feature->url_action), $this->listfeaturegroup) && !in_array($feature->id, $this->check_feature)) {
$fj = json_decode($feature->url_action);
if ($feature->parent_id == 0) {
$link = "";
if ($fj == NULL) {
$link = Route::has($feature->url_action) ? route($feature->url_action) : "";
} else {
$link = Route::has($fj[0]) ? route($fj[0]) : "";
}
$ul .= $this->createParent($value->feature, $feature->id, $link, $feature->name_feature);
}
}

}
if ($ul != "") {
$menu .= "<li class='treeview'>
<a href='#'>
<i class=''></i> <span>$value->name</span> <i class='fa fa-angle-left pull-right'></i>
</a>
<ul class='treeview-menu'>
$ul
</ul>
</li>";
}
}
view()->share('sidebar', $menu);
return $menu;
}*/
}