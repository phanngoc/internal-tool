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

		$route = Route::currentRouteName();

<<<<<<< HEAD


		if (!in_array($route, $allowed_routes) && $route != 'index' && !Request::ajax()) {
			return view("errors.error_permission");
		}

=======
		if (!in_array($route, $allowed_routes) && $route != 'index' && !Request::ajax()) {
			return view("errors.error_permission");
		}
>>>>>>> 1ab85b0b4e6c665fcf5d2cb9e46c2f7c5e7f70cc

		App::singleton('allowed_routes', function () use ($allowed_routes) {
			return $allowed_routes;
		});

		view()->share('allowed_routes', $allowed_routes);
		return $next($request);
	}

}
