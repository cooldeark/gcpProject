<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','indexLoginController@loginPage');
Route::post('/checkAuth','indexLoginController@checkAuth');
Route::get('/index','indexLoginController@loginSuccess');
Route::get('/logout','indexLoginController@logOut');
Route::get('/register','indexLoginController@register');
Route::post('/userRegist','indexLoginController@createUser');