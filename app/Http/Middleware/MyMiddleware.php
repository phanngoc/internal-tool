<?php
namespace App\Http\Middleware;

use App;
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
		//dd(json_encode($allowed_routes));
		$route = Route::currentRouteName();
		if (!in_array($route, $allowed_routes) && $route != 'index') {
			if (Request::ajax()) {
				return "error_permission";
			}

			return view("errors.error_permission");
		}

		App::singleton('allowed_routes', function () use ($allowed_routes) {
			return $allowed_routes;
		});

		view()->share('allowed_routes', $allowed_routes);
		return $next($request);
	}

}
