<?php

namespace Sayeed\JisfSSO\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class JisfAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
		$login_cookie = isset($_COOKIE['_ndoptor']) ? $_COOKIE['_ndoptor'] : null;
		$login_data_from_cookie = json_decode(base64_decode($login_cookie), true);
		if (!$login_data_from_cookie || $login_data_from_cookie['status'] !== 'success') {
			$redirect_url = url()->current();
			return redirect()->route('login', ['redirect' => $redirect_url]);
		}

        return $next($request);
    }
}
