<?php

return [
	/*
    |--------------------------------------------------------------------------
    | Login SSO URL
    |--------------------------------------------------------------------------
    |
    | This value is the url for sso login authentication.
    |
    */
	'login_sso_url' => env('LOGIN_SSO_URL', 'http://jisf-adalat.local/login'),

	/*
    |--------------------------------------------------------------------------
    | Logout SSO URL
    |--------------------------------------------------------------------------
    |
    | This value is the url for sso logout authentication.
    |
    */
	'logout_sso_url' => env('LOGOUT_SSO_URL', 'http://jisf-adalat.local/logout'),

];
