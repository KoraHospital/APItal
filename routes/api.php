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

Route::get('paciente/cita/{id}', 'CitaController@pacienteCita');
Route::get('medicamento/consulta/{id}', 'ConsultaController@medicamentoConsulta');
Route::get('personal/consulta/{id}', 'ConsultaController@personalConsulta');
Route::get('cita/consulta/{id}', 'ConsultaController@citaConsulta');

Route::resource('citas', 'CitaController');
Route::resource('consultas', 'ConsultaController');
Route::resource('medicamentos', 'MedicamentoController');
Route::resource('pacientes', 'PacienteController');
Route::resource('personales', 'PersonalController');

Route::put('citas/{id}', 'CitaController@update');
Route::put('consultas/{id}', 'ConsultaController@update');
Route::put('medicamentos/{id}', 'MedicamentoController@update');
Route::put('pacientes/{id}', 'PacienteController@update');
Route::put('personales/{id}', 'PersonalController@update');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

});