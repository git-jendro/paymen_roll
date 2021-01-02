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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//Route Karyawan
Route::get('/karyawan', 'KaryawanController@index');
Route::get('/karyawan/create', 'KaryawanController@create');
Route::post('/karyawan/store', 'KaryawanController@store');
Route::get('/karyawan/{nip}', 'KaryawanController@show');
Route::get('/karyawan/{nip}/edit', 'KaryawanController@edit');
Route::patch('/karyawan/{nip}', 'KaryawanController@update');
Route::get('/karyawan/{nip}/delete', 'KaryawanController@destroy');

//Route Gaji
Route::get('/gaji', 'GajiController@index');
Route::get('/gaji/ketentuan', 'GajiController@ketentuan');
Route::get('/gaji/status', 'GajiController@status');
Route::post('/gaji/store', 'GajiController@store');
Route::post('/gaji/ketentuan/store', 'GajiController@ketentuan_store');
Route::post('/gaji/print', 'GajiController@print');
 
//Route Absensi
Route::get('/absen', 'AbsenController@index');
Route::get('/absen/create', 'AbsenController@create');
Route::get('/absen/edit', 'AbsenController@edit');
Route::get('/absen/get', 'AbsenController@get');
Route::get('/absen/store/{id}/{m}/{s}/{i}/{c}/{l}/{o}/{total}/{names}/{index}', 'AbsenController@store');

//Route Laporan
Route::get('/laporan', 'LaporanController@index'); 
Route::get('/laporan/lihat', 'LaporanController@lihat');