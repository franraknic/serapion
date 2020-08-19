<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$http_origin = 'http://localhost:8080';
		$request_headers = apache_request_headers();
		$http_origin = null;
		if (isset($request_headers['Origin'])) {
			$http_origin = $request_headers['Origin'];
		}

		$headers = [
			'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
			'Access-Control-Allow-Credentials' => 'true',
			'Access-Control-Max-Age' => '86400 ',
			'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With, Accept, app'
		];
		if ($http_origin != null) {
			if (in_array($http_origin, ['http://localhost:8080'])) {
				$headers['Access-Control-Allow-Origin'] = $http_origin;
			}
		}

		$response = $next($request);

		if ($request->isMethod('OPTIONS')) {
			return response()->json('{"method":"OPTIONS"}', 200, $headers);
		}

		foreach ($headers as $key => $value) {
		    if (method_exists($response, 'header')) {
                $response->header($key, $value);
            }
		}

		return $response;
	}
}
