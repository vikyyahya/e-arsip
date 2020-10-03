<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard.dashboard');
    });

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users', 'UserController@user');
    Route::get('/tambahuser', 'UserController@tambah_user');
    Route::post('/buatuser', 'UserController@create');
    Route::get('/tampilubahuser/{id}', 'UserController@ubahuser');
    Route::post('/ubahuser/{id}', 'UserController@ubah');
    Route::get('/hapususer/{id}', 'UserController@hapus');
    Route::get('/users/cari', 'UserController@cari');

    //dokument
    Route::get('/datadokumen', 'DokumenController@index');
    Route::get('/tambahdokumen', 'DokumenController@tambah_dokumen');
    Route::post('/unggahdokumen', 'DokumenController@create');
    Route::get('/hapusdokumen/{id}', 'DokumenController@hapus');
    Route::get('/tampilubahdokumen/{id}', 'DokumenController@tampilubah');
    Route::post('/ubahdokumen/{id}', 'DokumenController@ubah');
    Route::get('/export_dokumen/{id}', 'DokumenController@export');
    Route::get('/dokumen/cari', 'DokumenController@cari');


    //divisi
    Route::get('/divisi', 'DivisiController@index');
    Route::get('/tambahdivisi', 'DivisiController@tambahdivisi');
    Route::post('/createdivisi', 'DivisiController@create');
    Route::post('/updatedivisi/{id}', 'DivisiController@update');
    Route::get('/hapusdivisi/{id}', 'DivisiController@delete');
    Route::get('/tampilubahdivisi/{id}', 'DivisiController@ubahdivisi');

    //kelola akun
    Route::get('/kelolaakun', 'KelolaAkunController@index');
    Route::post('/ubahprofil/{id}', 'KelolaAkunController@ubah');
});
