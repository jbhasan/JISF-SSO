<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Login Type
	|--------------------------------------------------------------------------
	|
	| This value is the type of your login authentication.
	| Example 'self', 'sso', 'api'
	| self = connect to your own database
	| sso = connect to sso
	| api = connect to api application
	|
	*/
	'login_type' => env('LOGIN_TYPE', 'sso'),

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
	'logout_sso_url' => env('LOGOUT_SSO_URL', 'http://jisf-adalat.local/sso-logout'),


	/*
    |--------------------------------------------------------------------------
    | Login API URL
    |--------------------------------------------------------------------------
    |
    | This value is the url for api login authentication.
    |
    */
	'login_api_url' => env('LOGIN_API_URL', 'http://jisf-adalat.local/api-login'),


];
