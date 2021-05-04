<?php

namespace Sayeed\JisfSSO\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class JisfSSOController extends Controller
{
	public function showLoginForm(Request $request)
	{
		$redirect_url = url('/login-response');
		if ($request->has('redirect') && $request->get('redirect') != '') {
			$redirect_url .= '?redirect=' . ($request->get('redirect'));
		}
		return redirect(config('jisf.login_sso_url') . '?referer=' . base64_encode(url($redirect_url)));
	}
	public function loginResponse(Request $request) {
		$data = json_decode(base64_decode($request->data), true);

		if ($data['status'] == 'success' && !empty($data['user_info'])) {
			$request->session()->put(['login' => ['status' => 'logged_in', 'user' => $data['user_info']]]);
			$request->session()->save();
			if ($request->has('redirect') && $request->get('redirect') != '') {
				return redirect($request->get('redirect'));
			} else {
				return redirect('/');
			}
		} else {
			return redirect('/login');
		}
	}

	public function logout(Request $request) {
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		$request->session()->put(['login' => ['status' => 'logged_out', 'user' => []]]);
		$request->session()->save();

		return redirect(config('jisf.logout_sso_url') . '?referer=' . base64_encode(url('/login-response')));
	}
}