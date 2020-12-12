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
    $kegiatan = DB::table('kegiatan')->orderBy('tanggal_kegiatan','desc')->simplePaginate(2);
    return view('index',['kegiatan' => $kegiatan]);
});

Auth::routes();


// guest
// profil
Route::get('/profil', 'C_Profil@index')->name('profil');
Route::get('/editprofil', 'C_Profil@edit')->name('editprofil');
Route::post('/editprofil', 'C_Profil@update')->name('updateprofil');
Route::get('/infaq', 'C_Donasi@index')->name('infaq');
Route::get('/infaqcheckout', 'C_Donasi@show')->name('infaqcheckout');
Route::post('/infaqcheckout', 'C_Donasi@store')->name('infaqcheckout');
// forum
Route::get('/forum', 'C_Forum@index')->name('forum');
Route::post('/forumcreate', 'C_Forum@store')->name('tambahforum');
Route::post('/forumedit/{id}', 'C_Forum@update')->name('editforum');
Route::post('/forumdestroy/{id}', 'C_Forum@destroy')->name('hapusforum');
Route::get('/forumdetail', 'C_Forum@show')->name('detailforum');
Route::post('/forumcomment/{forum}', 'C_Comments@store')->name('komentarforum');
// masjid
Route::get('/masjid', 'C_Masjid@index')->name('masjid');
Route::get('/masjiddetail/{id}', 'C_Masjid@show')->name('masjiddetail');
// kegiatan 
Route::post('/kegiatancreate', 'C_Kegiatan@store')->name('tambahkegiatan');
Route::post('/kegiatanedit', 'C_Kegiatan@update')->name('updatekegiatan');
Route::post('/kegiatandestroy', 'C_Kegiatan@destroy')->name('hapuskegiatan');



// admin
Route::get('/admin', 'adminController@index')->name('admin.home');
Route::get('/adminprofil', 'C_Profiladmin@index')->name('admin.profil');
Route::get('/admineditprofil', 'C_Profiladmin@edit')->name('admin.editprofil');
Route::post('/admineditprofil', 'C_Profiladmin@update')->name('admin.updateprofil');
Route::get('/adminmasjid', 'C_Masjidadmin@index')->name('admin.masjid');
Route::get('/admintambahmasjid', 'C_Masjidadmin@create')->name('admin.tambahmasjid');
Route::post('/admintambahmasjid', 'C_Masjidadmin@store')->name('admin.tambahmasjid');
Route::get('/admineditmasjid/{id}', 'C_Masjidadmin@edit')->name('admin.editmasjid');
Route::post('/admineditmasjid/{id}', 'C_Masjidadmin@update')->name('admin.editmasjid');
Route::get('/admindeletemasjid/{id}', 'C_Masjidadmin@destroy')->name('admin.deletemasjid');
Route::get('/adminkegiatan', 'C_Kegiatanadmin@index')->name('admin.kegiatan');
Route::get('/adminkegiatancreate', 'C_Kegiatanadmin@create')->name('admin.tambahkegiatan');
Route::post('/adminkegiatancreate', 'C_Kegiatanadmin@store')->name('admin.tambahkegiatan');
Route::get('/adminkegiatanedit', 'C_Kegiatanadmin@edit')->name('admin.editkegiatan');
Route::post('/adminkegiatanedit', 'C_Kegiatanadmin@update')->name('admin.updatekegiatan');
Route::get('/adminkegiatandestroy', 'C_Kegiatanadmin@destroy')->name('admin.hapuskegiatan');
Route::get('/adminlogin', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
Route::post('/adminlogin', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
Route::get('/adminregister', 'AuthAdmin\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('/adminregister', 'AuthAdmin\RegisterController@register')->name('admin.register.submit');
Route::get('/admininfaq', 'C_Infaqadmin@index')->name('admin.infaq');
Route::get('/admininfaqedit/{id}', 'C_Infaqadmin@update')->name('admin.editinfaq');
Route::get('/admininfaqdestroy/{id}', 'C_Infaqadmin@destroy')->name('admin.hapusinfaq');