<?php
namespace App\Http\Middleware;

use App;
use App\FeatureNode;
use App\Group;
use Auth;
use Closure;
use Request;
use Route;
use View;

class MyMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!Auth::user()) {
			return redirect('auth/login');
		}

		$groupall = Auth::user()->group()->get();
		$allowed_routes = array();

		foreach ($groupall as $key => $value) {
			$feature = Group::find($value->id)->feature()->get();
			foreach ($feature as $key_fea => $val_fea) {
				$val_fea_j = json_decode($val_fea->url_action);

				if ($val_fea_j != NULL) {
					foreach ($val_fea_j as $k_valfea => $v_valfea) {
						array_push($allowed_routes, $v_valfea);
					}
				} else {
					array_push($allowed_routes, $val_fea->url_action);
				}
			}
		}
		view()->share('sidebar', ($this->showSidebar($allowed_routes)));
		App::singleton('allowed_routes', function () use ($allowed_routes) {
			return $allowed_routes;
		});

		view()->share('allowed_routes', $allowed_routes);
		return $next($request);
	}

	public function showSidebar($allowed_routes) {
		$module_array = App\Module::orderBy('order', 'DESC')->get();
		$menu = "";
		foreach ($module_array as $key => $value) {
			$number = 0;
			$ul = "";
			foreach ($value->feature as $feature) {
				$li = "";
				$route = json_decode($feature->url_action);
				if ($route == NULL) {
					$route = $feature->url_action;
				} else {
					$route = $route[0];
				}
				if ($feature->is_menu && $feature->parent_id == 0 && in_array($route, $allowed_routes)) {
					$link = Route::has($route) ? route($route) : "#";
					$items = FeatureNode::defaultOrder()->descendantsOf($feature->id);
					$items->linkNodes();
					$items = $items->toTree();
					$li = $this->getMenuchildren($items, $allowed_routes, $number);
					if ($number >= 1) {
						$li = "<li><a href='$link'>$feature->name_feature<i class='fa fa-angle-left pull-right'></i></a><ul class='treeview-menu'>$li</ul></li>";
					} else {
						$li = "";
					}
				}
				$ul .= $li;
			}
			$menu .= $ul;
		}
		return $menu;
	}

	public function getMenuchildren($features, $allowed_routes, &$number) {
		$ul = "";
		$count = 0;
		$number = 0;
		foreach ($features as $value) {
			$li = "";
			$route = json_decode($value->url_action);
			if ($route == NULL) {
				$route = $value->url_action;
			} else {
				$route = $route[0];
			}
			$number = 0;
			if ($value->is_menu && in_array($route, $allowed_routes)) {
				$link = Route::has($route) ? route($route) : "#";
				if (count($value->children) != 0) {
					$li = $this->getMenuchildren($value->children, $allowed_routes, $number);
				}
				$count++;
				if ($number >= 1) {
					if ($number > 1) {
						$li = "<li><a href='$link'>$value->name_feature<i class='fa fa-angle-left pull-right'></i></a><ul class='treeview-menu'>$li</ul></li>";
					}

				} else {
					$li = "<li><a href='$link'>$value->name_feature</a></li>";
				}
			}
			$ul .= $li;
		}
		$number = $count;
		return $ul;
	}
}
