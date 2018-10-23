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

Route::get('/', 'EncuestaController@index')->name("encuesta");
Route::post('/procesar-encuesta', 'EncuestaController@procesar')->name("procesar");
Route::get('/detalle-encuesta', 'EncuestaController@detalle')->name('detalle-encuesta');
Route::get('/saldos', 'TestController@saldos')->name('saldos');
