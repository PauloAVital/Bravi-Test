<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('Contato/{id}/Pessoa', 'Api\ControllerContato@pessoa');
Route::get('Pessoa/{id}/Contato', 'Api\ControllerPessoa@contato');

Route::apiResource('Pessoa', 'Api\ControllerPessoa');
Route::apiResource('Contato', 'Api\ControllerContato');



