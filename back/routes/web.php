<?php

// vue
Route::group(['as' => 'vue.', 'prefix' => 'vue','middleware' => ['auth']], function(){
    Route::get('/', function () {
        return view('vue.index');
    });
});


// v1
Route::get('v1/financeiro', 'v1\Financeiro\ContasAPagarController@index');
Route::get('/api/v1/getclientelaspalmas', 'Api\v1\Clientes\ApiClientes@lasPalmas');

/* API */ 
Route::get('/api/financeiro','Financeiro\ContasapagarController@apiContas');
Route::get('criar',['as'=>'create','uses' => 'cliente\clienteController@create']);


/* COMANDOS ARTISAN */
Route::get('/executar/migrate', function() {
    Artisan::call('migrate', ['--seed' => true]);
    return ("Migrate Sucess");
    });

    /* COMANDOS ARTISAN */
Route::get('/executar/seed/unidades', function() {
    Artisan::call('db:seed', ['--class'=> 'UnidadesNegocio']);
    return ("Seed Sucess");
    });

        /* COMANDOS ARTISAN */
Route::get('/executar/seed/valor/vazio', function() {
    Artisan::call('db:seed', ['--class'=> 'valorVazio']);
    return ("Seed Sucess");
    });


// 

// AUTH
Route::get('/sair',function(){
   Auth::logout(); 
   return redirect('/login');
});          

// PRECISO TESTAR
Route::any('/login/imagem/{emaillogin?}', ['uses' =>'Auth\LoginController@imagem']);
 Route::get('/', ['uses' =>'Home\InicioController@Index'])->middleware('auth'); 
 Route::get('/home', ['uses' =>'Home\InicioController@Index'])->middleware('auth'); 

// Relatórios FINANCEIRO ANUAl
Route::group(['as' => 'relatorio.', 'prefix' => 'relatorio','middleware' => ['auth']], function(){
    Route::get('/anual', ['as' => 'anual', 'uses' => 'Api\Financeiro\ApiRelatorio@anual']); 
});
  

// FINANCEIRO
Route::group(['as' => 'financeiro.', 'prefix' => 'financeiro', 'middleware' => ['auth']], function(){
    
    /*CONTAS A PAGAR*/
    Route::any('/', ['as' => 'index', 'uses' => 'Financeiro\ContasapagarController@index']); 
    Route::get('criar/{data}',['as' => 'create', 'uses' => 'Financeiro\ContasapagarController@create']);
    Route::post('salvar', ['as' => 'store', 'uses' => 'Financeiro\ContasapagarController@store']);
    Route::get('{id}/{data}/editar',['as'=>'edit','uses'=>'Financeiro\ContasapagarController@edit']);
    Route::post('atualizar',['as'=>'update','uses' => 'Financeiro\ContasapagarController@update']);
    Route::get('{id}/remover', ['as' => 'destroy', 'uses' => 'Financeiro\ContasapagarController@destroy']);

    /* RELATÓRIOS */
    Route::any('/mensal',['as' => 'mensal', 'uses' => 'Financeiro\RelatorioController@mensal']);
    Route::any('/anual/{ano?}',['as' => 'anual', 'uses' => 'Financeiro\RelatorioController@anual']);
    Route::any('/relatorioconsolidado',['as' => 'relatorioconsolidado', 'uses' => 'Financeiro\RelatorioController@consolidado']);
    
    Route::any('/relatorioarea',['as' => 'relatorioarea', 'uses' => 'Financeiro\RelatorioController@relatorioArea']);

    /* EMITIR PAGAMENTO*/
    Route::any('emitirpagamento', ['as' => 'emitir', 'uses' => 'Financeiro\ContasapagarController@emitirpagamento']);
    Route::any('salvarpagamento', ['as' => 'salvarpagamento', 'uses' => 'Financeiro\ContasapagarController@salvarpagamento']);
    Route::any('pagamento/{numero}', ['as' => 'pagamento', 'uses' => 'Financeiro\ContasapagarController@pagamento']);
    

     /*FATURA CONSOLIDADA*/
    Route::get('faturaconsolidada',['as' =>'indexconsolidada','uses' => 'Financeiro\faturaConsolidadaController@index']); 
    Route::get('faturaconsolidada/dd',['as' =>'indexconsolidadadd','uses' => 'Financeiro\faturaConsolidadaController@dd']); 
});

    /* AREA */
    Route::group(['as' => 'areas.', 'prefix' => 'areas', 'middleware' => ['auth']], function(){
        Route::get('/', ['uses' => 'areasController@allAreas'])->name('index');    
        Route::get('/{id}', ['uses' => 'areasController@editArea'])->name('editar');
    });

// FORNECEDOR
Route::group(['as' => 'fornecedor.','prefix' => 'fornecedor', 'middleware' => ['auth']],function(){
    Route::get('/',['as'=>'index','uses' => 'Fornecedor\fornecedorController@index']);
    Route::get('criar',['as'=>'create','uses' => 'Fornecedor\fornecedorController@create']);
    Route::any('salvar',['as'=>'store','uses' => 'Fornecedor\fornecedorController@store']);
    Route::any('editar/{id}',['as'=>'edit','uses' => 'Fornecedor\fornecedorController@edit']);
    Route::any('atualizar',['as'=>'update','uses' => 'Fornecedor\fornecedorController@update']);
});  

// AGENDA
Route::group(['as' => 'agenda.','prefix' => 'agenda', 'middleware' => ['auth']],function(){
    Route::any('/',['as' =>'index','uses' =>'agenda\agendaController@index']);
    Route::any('criar',['as' =>'create','uses' =>'agenda\agendaController@create']);
    Route::any('salvar',['as'=>'store','uses' => 'agenda\agendaController@store']);
    Route::any('editar/{id}',['as'=>'edit','uses' => 'agenda\agendaController@edit']);
    Route::any('atualizar',['as'=>'update','uses' => 'agenda\agendaController@update']);
    
    Route::any('calendario',['as' =>'calendario','uses' =>'agenda\calendarioController@Index']);
    Route::any('calendariojson',['as' =>'calendariojson','uses' =>'agenda\calendarioController@json']);
});

// EMAIL
Route::any('/send', 'EmailController@send');
Route::any('/mail', 'EmailController@index');

// AUTH
Auth::routes();


