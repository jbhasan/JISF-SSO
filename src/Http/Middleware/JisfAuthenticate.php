<?php

namespace Sayeed\JisfSSO\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
		$login_session = session('login');
		$login_session = $login_session ? $login_session : null;
		if (!$login_session || $login_session['status'] !== 'logged_in') {
			return redirect()->route('login');
		}

        return $next($request);
    }
}
