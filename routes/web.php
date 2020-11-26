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


// guest
// profil
Route::get('/profil', 'C_Profil@index')->name('profil');
Route::get('/editprofil', 'C_Profil@edit')->name('editprofil');
Route::post('/editprofil', 'C_Profil@update')->name('updateprofil');
// forum
Route::get('/forum', 'C_Forum@index')->name('forum');
Route::post('/forumcreate', 'C_Forum@store')->name('tambahforum');
Route::post('/forumedit/{id}', 'C_Forum@update')->name('editforum');
Route::post('/forumdestroy/{id}', 'C_Forum@destroy')->name('hapusforum');



// admin
Route::get('/admin', 'adminController@index')->name('admin.home');
Route::get('/adminprofil', 'C_Profiladmin@index')->name('admin.profil');
Route::get('/admineditprofil', 'C_Profiladmin@edit')->name('admin.editprofil');
Route::post('/admineditprofil', 'C_Profiladmin@update')->name('admin.updateprofil');
Route::get('/adminforum', 'C_Forumadmin@index')->name('admin.forum');
Route::get('/adminkegiatan', 'C_Kegiatan@index')->name('admin.kegiatan');
Route::get('/adminkegiatancreate', 'C_Kegiatan@create')->name('admin.tambahkegiatan');
Route::post('/adminkegiatancreate', 'C_Kegiatan@store')->name('admin.tambahkegiatan');
Route::get('/adminkegiatanedit', 'C_Kegiatan@edit')->name('admin.editkegiatan');
Route::post('/adminkegiatanedit', 'C_Kegiatan@update')->name('admin.updatekegiatan');
Route::get('/adminkegiatandestroy', 'C_Kegiatan@destroy')->name('admin.hapuskegiatan');
Route::get('/adminlogin', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
Route::post('/adminlogin', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
Route::get('/adminregister', 'AuthAdmin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/adminregister', 'AuthAdmin\RegisterController@register')->name('admin.register.submit');