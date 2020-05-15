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


Route::get('/','StudioController@index');
Route::get('/mitra','MitraController@index');
Route::get('/mitra/registrasi','MitraController@registrasi');
Route::get('/mitra/login','MitraController@login');
Route::get('studio/{ruang}','StudioController@detail');
Route::get('/searchProvinsi','MitraController@searchProvinsi');
Route::get('/logoutMitra', 'MitraLoginController@logout');
Route::post('/registerMitra','MitraController@register');
Route::get('/search','StudioController@search');
Route::get('/searchKatalog','StudioController@searchKatalog');
Route::post('/loginMitra', 'MitraLoginController@login');
Route::post('/booking', 'StudioController@booking');
Route::post('/katalog', 'StudioController@katalog');


Route::get('/logout', 'HomeController@logout');
Route::get('/transaksi-booking', 'HomeController@transaksi');
Route::get('/pembayaran', 'HomeController@pembayaran');
Route::get('/account', 'HomeController@account');
Route::get('/pesanan-saya', 'HomeController@pesananSaya');
Route::get('/pesanan-saya/{pemesanan}', 'HomeController@detailPesanan');
Route::get('/notifikasi', 'HomeController@notifikasi');

Route::post('/verifikasi', 'HomeController@verifikasi');
Route::post('/changeImage', 'HomeController@changeImage');
Route::post('/changePasswordUser', 'HomeController@changePassword');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');


/**
 * route only for student profile
 */
Route::group(['middleware'=>'mita'], function() {

    Route::get('/admin', 'MitraController@admin');
    Route::get('/studio', 'MitraController@studio');
    Route::get('/transaksi', 'MitraController@transaksi');
    Route::get('/jadwal', 'MitraController@jadwal');
    Route::get('/pendding', 'MitraController@pending');
    Route::get('/accept', 'MitraController@accept');
    Route::get('/kasir', 'MitraController@kasir');
    Route::get('/data', 'MitraController@dataJadwal');
    Route::get('/ruangan/{studio}', 'MitraController@ruangan');


    Route::post('/addStudio', 'MitraController@addStudio');
    Route::post('/provinsi', 'MitraController@provinsi');
    Route::post('/addRuangan', 'MitraController@addRuangan');
    Route::post('/changeImageMitra', 'MitraController@changeImage');
    Route::post('/changePasswordMitra', 'MitraController@changePassword');
    Route::post('/changeAlamat', 'MitraController@changeAlamat');
    Route::post('/changeNomor', 'MitraController@changeNomor');
    Route::post('/updateStudio', 'MitraController@updateStudio');
    Route::post('/deleteStudio', 'MitraController@deleteStudio');
    Route::post('/hapusRuang', 'MitraController@hapusRuang');
    Route::post('/updateRuang', 'MitraController@updateRuang');
    Route::post('/kode', 'MitraController@kode');
    Route::post('/pembayaranKode', 'MitraController@pembayaran');

});

