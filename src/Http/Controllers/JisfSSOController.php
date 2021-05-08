<?php

namespace Sayeed\JisfSSO\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Cookie\CookieJar;
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
		$data = json_decode(gzuncompress(base64_decode($request->data)), true);
		if ($data['status'] == 'success' && !empty($data['user_info'])) {
			$this->createNewCookie($data);
			if ($request->has('redirect') && $request->get('redirect') != '') {
				return redirect($request->get('redirect'));
			} else {
				return redirect('/');
			}
		} else {
			return redirect('/login');
		}
	}

	public function createNewCookie($requested_data_new) {
		$requested_data_new = base64_encode(gzcompress(json_encode($requested_data_new)));
		setcookie('_ndoptor', $requested_data_new, strtotime( '+1 days' ), '/');
		return $requested_data_new;
	}

	public function logout(Request $request) {
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		unset($_COOKIE['_ndoptor']);
		setcookie('_ndoptor', null, strtotime( '-1 days' ), '/');

		return redirect(config('jisf.logout_sso_url') . '?referer=' . base64_encode(url('/login-response')));
	}
}