<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('gaji/invoice', function () {
    return view('/gaji/invoice');

    // $pdf = PDF::loadView('gaji/invoice');
    // return $pdf->download('gaji/invoice.pdf');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route Karyawan
Route::get('/karyawan', 'KaryawanController@index');
Route::get('/karyawan/create', 'KaryawanController@create');
Route::post('/karyawan/store', 'KaryawanController@store');
Route::get('/karyawan/{id}', 'KaryawanController@show');
Route::get('/karyawan/{id}/edit', 'KaryawanController@edit');
Route::patch('/karyawan/{id}', 'KaryawanController@update');
Route::get('/karyawan/{id}/delete', 'KaryawanController@destroy');

//Route Gaji
Route::get('/gaji', 'GajiController@index');
Route::get('/gaji/ketentuan', 'GajiController@ketentuan');
Route::get('/gaji/status', 'GajiController@status');
Route::post('/gaji/store', 'GajiController@store');
// Route::get('/gaji/print', 'GajiController@print');
 
//Route Absensi
Route::get('/absen', 'AbsenController@index');
Route::get('/absen/create', 'AbsenController@create');
Route::get('/absen/edit', 'AbsenController@edit');

//Route Laporan
Route::get('/laporan', 'LaporanController@index');
Route::get('/laporan/lihat', 'LaporanController@lihat');