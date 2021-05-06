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
		$login_session = $request->session()->get('login');
		$login_session = $login_session ? $login_session : null;
		if (!$login_session || $login_session['status'] !== 'logged_in') {
			$redirect_url = url()->current();
			return redirect()->route('login', ['redirect' => $redirect_url]);
		}

        return $next($request);
    }
}
