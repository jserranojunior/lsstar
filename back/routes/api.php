<?php

use Illuminate\Http\Request;
// use Auth;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// V1 CLIENTES

Route::group([
    'middleware' => ['cors'],
    'prefix' => 'v1/cliente',
], function ($router) {
     //Add you routes here, for example:
        Route::get('/', 'Api\v1\Clientes\ApiClientes@index');
        Route::post('/', 'Api\v1\Clientes\ApiClientes@store');
        Route::get('/{id}', 'Api\v1\Clientes\ApiClientes@edit');
        Route::patch('/{id}', 'Api\v1\Clientes\ApiClientes@update');
        Route::put('/{id}', 'Api\v1\Clientes\ApiClientes@update');
});


Route::group([
    'middleware' => ['cors'],
    'prefix' => 'v1/logado',
], function ($router) {
        Route::get('/', 'Api\v1\Auth\AuthController@logado');
});







Route::group(['as' => 'casas.', 'prefix' => 'v1/casa'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'Api\v1\Empreendimentos\ApiEmpreendimentos@index']); 
    Route::get('/{id}', ['as' => 'edit', 'uses' => 'Api\v1\Empreendimentos\ApiEmpreendimentos@edit']);

    Route::put('/{id}', ['as' => 'update', 'uses' => 'Api\v1\Empreendimentos\ApiEmpreendimentos@update']);
    Route::post('/', ['as' => 'store', 'uses' => 'Api\v1\Empreendimentos\ApiEmpreendimentos@store']);
});

// FORNECEDORES
Route::group(['as' => 'fornecedores.', 'prefix' => 'v1/fornecedores'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'Api\v1\Fornecedores\ApiFornecedorController@index']); 
    Route::get('/{id}', ['as' => 'edit', 'uses' => 'Api\v1\Fornecedores\ApiFornecedorController@edit']);

    Route::put('/{id}', ['as' => 'update', 'uses' => 'Api\v1\Fornecedores\ApiFornecedorController@atualizar']);
    Route::post('/', ['as' => 'store', 'uses' => 'Api\v1\Fornecedores\ApiFornecedorController@store']);
});




Route::group(['as' => 'relatorio.', 'prefix' => 'relatorio'], function(){
    Route::get('/anual', ['as' => 'anual', 'uses' => 'Api\Financeiro\ApiRelatorio@anual']);    
    
});

Route::group([
    'middleware' => ['cors'],
    'prefix' => 'v1/financeiro',
], function ($router) {
        Route::get('/', 'Api\v1\Financeiro\ApiContasAPagarController@index');

});


// V1

// Emitir Pagamento
Route::get('v1/emitirpagamento/{id}', 'Api\v1\Financeiro\ApiEmitirPagamentoController@edit');
Route::post('v1/emitirpagamento', 'Api\v1\Financeiro\ApiEmitirPagamentoController@store');
Route::post('v1/emitirpagamento', 'Api\v1\Financeiro\ApiEmitirPagamentoController@store');
Route::post('v1/emitirpagamento/delete', 'Api\v1\Financeiro\ApiEmitirPagamentoController@destroy');
  

