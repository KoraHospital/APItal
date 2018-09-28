<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('citas', 'CitasController');
Route::resource('consultas', 'ConsultasController');
Route::resource('medicamentos', 'MedicamentosController');
Route::resource('pacientes', 'PacientesController');
Route::resource('personales', 'PersonalesController');

Route::put('citas/{id}', 'CitasController@update');
Route::put('consultas/{id}', 'ConsultasController@update');
Route::put('medicamentos/{id}', 'MedicamentosController@update');
Route::put('pacientes/{id}', 'PacientesController@update');
Route::put('personales/{id}', 'PersonalesController@update');

