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
    $kegiatan = DB::table('kegiatan')->get();
    return view('index',['kegiatan' => $kegiatan]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin', 'adminController@index')->name('admin.home');
Route::get('/adminkegiatan', 'adminController@kegiatan')->name('admin.kegiatan');
Route::get('/adminlogin', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
Route::post('/adminlogin', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
Route::get('/adminregister', 'AuthAdmin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/adminregister', 'AuthAdmin\RegisterController@register')->name('admin.register.submit');