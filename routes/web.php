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
    return view('welcome');
    //return view('auth/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/excel','TransaksiController@excel')->name('laporan.excel');

    //kategori Controller
    Route::get('/kategori', 'KategoriController@index');
    Route::post('/kategori/store', 'KategoriController@store');
    Route::get('/kategori/edit/{id}', 'KategoriController@edit');
    Route::post('/kategori/update/{id}', 'KategoriController@update');
    Route::delete('/kategori/hapus/{id}', 'KategoriController@destroy');

    //tiket Controller
    Route::get('/tiket','TiketController@index');
    Route::post('/tiket/store','TiketController@store');
    Route::get('/tiket/edit/{id}','TiketController@edit');
    Route::post('/tiket/update/{id}','TiketController@update');
    Route::delete('/tiket/hapus/{id}','TiketController@destroy');

    //transaksi controller
    Route::get('/transaksi','TransaksiController@index');
    Route::post('/transaksi/store','TransaksiController@store');
    Route::delete('/transaksi/hapus/{id}','TransaksiController@destroy');
    Route::get('/transaksi/update','TransaksiController@update');

    //PDF
    Route::get('/download-pdf','TiketController@downloadPDF');
});




