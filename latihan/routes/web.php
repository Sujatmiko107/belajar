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

Route::get('/','dashboardController@index');
Route::get('karyawan','karyawanController@index');
Route::get('kehadiran/add','dashboardController@create');
Route::get('karyawan/add','karyawanController@create');
Route::post('kehadiran/create','dashboardController@store');
Route::post('karyawan/create','karyawanController@store');
Route::get('kehadiran/edit/{id}','dashboardController@edit');
Route::get('karyawan/edit/{id}','karyawanController@edit');
Route::post('kehadiran/update/{id}','dashboardController@update');
Route::post('karyawan/update/{id}','karyawanController@update');
Route::get('kehadiran/delete/{id}','dashboardController@destroy');
Route::get('karyawan/delete/{id}','karyawanController@destroy');
Route::get('kehadiran/search','dashboardController@show');
Route::get('karyawan/search','karyawanController@show');
