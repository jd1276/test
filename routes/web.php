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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'Auth\UserLoginController@showLoginForm')->name('login');
Route::post('/user-login', 'Auth\UserLoginController@login')->name('user-login');
Route::get('/user/register', 'Auth\UserLoginController@registerForm')->name('register');
Route::post('/user/register', 'Auth\UserLoginController@store')->name('store');
Route::group(['middleware' => ['web']], function () {
    Route::get('/user-logout', 'Auth\UserLoginController@logout')->name('user-logout');
    Route::get('/usr-dashboard', 'Auth\UserLoginController@dashboard')->name('user-dashboard');
});
//Route::group(['middleware' => ['web']], function () {
//});

Route::get('/admin', 'Auth\AdminLoginController@showLoginForm')->name('admin');
Route::post('/admin', 'Auth\AdminLoginController@login')->name('admin-login');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin-logout');
    Route::get('/dashboard', 'Auth\AdminLoginController@dashboard')->name('admin-dashboard');

});

