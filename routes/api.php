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

Route::group(['as' => 'casa.', 'prefix' => 'casa'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'Api\ApiCasa@index']); 
    Route::post('/', ['as' => 'store', 'uses' => 'Api\ApiCasa@store']);
    Route::get('/{id}', ['as' => 'edit', 'uses' => 'Api\ApiCasa@edit']);
    Route::put('/{id}', ['as' => 'put', 'uses' => 'Api\ApiCasa@update']);
    
});

Route::group(['as' => 'relatorio.', 'prefix' => 'relatorio'], function(){
    Route::get('/anual', ['as' => 'anual', 'uses' => 'Api\Financeiro\ApiRelatorio@anual']); 
    
    
});

// V1
Route::get('v1/financeiro', 'Api\v1\Financeiro\ApiContasAPagarController@index');

// Emitir Pagamento
Route::get('v1/emitirpagamento/{id}', 'Api\v1\Financeiro\ApiEmitirPagamentoController@edit');
Route::post('v1/emitirpagamento', 'Api\v1\Financeiro\ApiEmitirPagamentoController@store');
  
