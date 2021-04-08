<?php

namespace Sayeed\JisfSSO\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JisfSSOController extends Controller
{
	public function showLoginForm()
	{
		return redirect(config('jisf.login_sso_url') . '?referer=' . base64_encode(url('/login-response')));
	}
	public function loginResponse(Request $request) {
		$data = json_decode(base64_decode($request->data), true);
		if ($data['status'] == 'success' && !empty($data['user_info'])) {
			session()->put(['login' => ['status' => 'logged_in', 'user' => $data['user_info']]]);
			session()->save();

			return redirect('/');
		} else {
			return redirect('/login');
		}
	}

	public function logout(Request $request) {
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		session(['login' => ['status' => 'logged_out', 'user' => []]]);

		return redirect(config('jisf.logout_sso_url') . '?referer=' . base64_encode(url('/login-response')));
	}
}