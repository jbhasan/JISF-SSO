<?php

namespace Sayeed\JisfSSO\Http\Controllers;

use Illuminate\Http\Request;

class JisfSSOController
{
	public function showLoginForm()
	{
		return redirect(config('jisf.login_sso_url') . '?referer=' . base64_encode(url('/login-response')));
	}
	public function loginResponse(Request $request) {
		$data = json_decode(base64_decode($request->data), true);
		if ($data['status'] == 'success') {
			session(['login' => ['status' => 'logged_in', 'user' => $data['user_info']]]);
			return redirect('/');
		} else {
			return redirect('/login');
		}
	}
}