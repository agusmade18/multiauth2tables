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

Auth::routes([
	'register' => false, // Registration Routes...
  'reset' => false, // Password Reset Routes...
  'verify' => false, // Email Verification Routes...
]);

Route::prefix('admin')->group(function() {
    Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('logout/', 'Auth\AdminLoginController@logout')->name('admin.logout');
    Route::get('/', 'Auth\AdminController@index')->name('admin.dashboard');
   }) ;

Route::prefix('siswa')->group(function() {
    Route::get('/login','Auth\SiswaLoginController@showLoginForm')->name('siswa.login');
    Route::post('/login', 'Auth\SiswaLoginController@login')->name('siswa.login.submit');
    Route::get('logout/', 'Auth\SiswaLoginController@logout')->name('siswa.logout');
    Route::get('/', 'Auth\SiswaController@index')->name('siswa.dashboard');
   }) ;
