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
Route::post('/karyawan/import', 'KaryawanController@import');
Route::get('/karyawan/{nip}', 'KaryawanController@show');
Route::get('/karyawan/{nip}/edit', 'KaryawanController@edit');
Route::patch('/karyawan/{nip}', 'KaryawanController@update');
Route::get('/karyawan/{nip}/delete', 'KaryawanController@destroy');

//Route Gaji
Route::get('/gaji', 'GajiController@index');
Route::get('/gaji/ketentuan', 'GajiController@ketentuan_view');
Route::get('/gaji/status', 'GajiController@status');
Route::post('/gaji/store', 'GajiController@store');
// Route::post('/gaji/ketentuan/store', 'GajiController@ketentuan_store');
Route::post('/gaji/print', 'GajiController@print');
Route::post('/gaji/hitung', 'GajiController@hitung');
 
//Route Absensi
Route::get('/absen', 'AbsenController@index');
Route::get('/absen/create', 'AbsenController@create');
Route::get('/absen/edit', 'AbsenController@edit');
Route::get('/absen/get', 'AbsenController@get');
Route::post('/absen/import', 'AbsenController@import');
Route::post('/absen/nama', 'AbsenController@nama');
Route::get('/absen/store/{id}/{m}/{s}/{i}/{c}/{l}/{o}/{total}/{names}/{index}', 'AbsenController@store');

//Route Laporan
Route::get('/laporan', 'LaporanController@index'); 
Route::get('/laporan/lihat/', 'LaporanController@lihat');
Route::get('/laporan/{id}', 'LaporanController@show');
Route::post('/laporan/store', 'LaporanController@store');
Route::post('/laporan/simpan', 'LaporanController@simpan');
Route::get('/laporan/create/{month}/{year}/{status}', 'LaporanController@create'); 

//Route Filter Karyawan
Route::post('/nip', 'FilterKaryawanController@nip'); 
Route::post('/nik', 'FilterKaryawanController@nik'); 
Route::post('/tipe', 'FilterKaryawanController@tipe'); 
Route::post('/status', 'FilterKaryawanController@status'); 
Route::post('/nama', 'FilterKaryawanController@nama'); 
Route::post('/jk', 'FilterKaryawanController@jk');
Route::post('/hitung', 'FilterKaryawanController@hitung');
Route::post('/bayar', 'FilterKaryawanController@bayar');

//Route User
Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::get('/user/{id}/edit', 'UserController@edit');
Route::get('/user/{id}/delete', 'UserController@destroy');
Route::post('/user/store', 'UserController@store');
Route::post('/user/{id}', 'UserController@update');  

//Route FilterLaporan
Route::post('/filterlaporan/id', 'FilterLaporanController@id');
Route::post('/filterlaporan/nama', 'FilterLaporanController@nama');
Route::post('/filterlaporan/status', 'FilterLaporanController@status');
Route::post('/filterlaporan/bulan', 'FilterLaporanController@bulan');
Route::post('/filterlaporan/tahun', 'FilterLaporanController@tahun'); 

