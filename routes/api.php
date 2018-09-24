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

Route::get('/cliente', 'Api\ApiCliente@index');
Route::get('/cliente/{id}', 'Api\ApiCliente@edit');
Route::post('/cliente', 'Api\ApiCliente@store');
Route::patch('/cliente/{id}', 'Api\ApiCliente@update');
Route::put('/cliente/{id}', 'Api\ApiCliente@update');