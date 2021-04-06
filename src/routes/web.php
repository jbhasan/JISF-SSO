<?php

/*
|--------------------------------------------------------------------------
| Crud Generator Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', 'Sayeed\JisfSSO\Http\Controllers\JisfSSOController@showLoginForm')->name('login');
Route::get('/login-response', 'Sayeed\JisfSSO\Http\Controllers\JisfSSOController@loginResponse');
Route::get('/testing', 'Sayeed\JisfSSO\Http\Controllers\JisfSSOController@loginResponse')->name('testing');
