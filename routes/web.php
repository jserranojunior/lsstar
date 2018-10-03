<?php

/* COMANDOS ARTISAN */
Route::get('/executar/migrate', function() {
    Artisan::call('migrate', []);
    return ("Migrate Sucess");
    });


/* API */ 
Route::get('/api/financeiro','Financeiro\ContasapagarController@apiContas');


// Manutencao
Route::group(['as' => 'manutencao.', 'prefix' => 'manutencao','middleware' => ['auth']], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'Manutencao\ManutencaoController@index']); 
    Route::get('/novo', ['as' => 'create', 'uses' => 'Manutencao\ManutencaoController@create']);
});



// Relatórios
Route::group(['as' => 'relatorio.', 'prefix' => 'relatorio','middleware' => ['auth']], function(){
    Route::get('/anual', ['as' => 'anual', 'uses' => 'Api\Financeiro\ApiRelatorio@anual']); 
});
  

// CASAS

Route::group(['as' => 'casa.', 'prefix' => 'casa','middleware' => ['auth']], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'Casas\CasasController@index']); 
    Route::get('/editar/{id}', ['as' => 'edit', 'uses' => 'Casas\CasasController@edit']);
    Route::get('/criar', ['as' => 'edit', 'uses' => 'Casas\CasasController@create']);
   Route::post('/cadastrar', ['as' => 'store', 'uses' => 'Casas\CasasController@store']);
   Route::post('/atualizar', ['as' => 'update', 'uses' => 'Casas\CasasController@update']);
});



Route::get('/sair',function(){
   Auth::logout(); 
   return redirect('/login');
});        
  
Route::any('/login/imagem/{emaillogin?}', ['uses' =>'Auth\LoginController@imagem']);

 Route::get('/', ['uses' =>'InicioController@Index'])->middleware('auth'); 

 Route::get('/home', ['uses' =>'InicioController@Index'])->middleware('auth'); 


Route::group(['as' => 'inicio.', 'prefix' =>'inicio'],function(){
  Route::get('/', ['as' => 'index', 'uses' =>'InicioController@Index'])->middleware('auth');  
});


Route::get('/fazer','wiki\FazerController@Index')->middleware('auth');

Route::get('/teste/{id?}', 'InicioController@Teste')->middleware('auth');

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

    //  Route::any('/relatorioarea/{id}',['as' => 'relatoriarea', 'uses' => 'Financeiro\RelatorioController@relatorioArea']);
    

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



Route::group(['as' => 'stock.','prefix' => 'estoque', 'middleware' => ['auth']],function(){
    Route::get('/',['as'=>'index','uses' => 'StockController@index']);
    Route::get('criar',['as'=>'create', 'uses'=>'StockController@create']);
    Route::any('salvar', ['as'=>'store','uses'=>'StockController@store']);
    Route::any('editar',['as' => 'edit','uses' => 'StockController@edit']);
    Route::any('atualizar',['as' => 'update', 'uses' => 'StockController@update']);
    Route::get('{id}/remover', ['as' => 'destroy', 'uses' => 'StockController@destroy']);
});  

 

Route::group(['as' => 'fornecedor.','prefix' => 'fornecedor', 'middleware' => ['auth']],function(){
    Route::get('/',['as'=>'index','uses' => 'Fornecedor\fornecedorController@index']);
    Route::get('criar',['as'=>'create','uses' => 'Fornecedor\fornecedorController@create']);
    Route::any('salvar',['as'=>'store','uses' => 'Fornecedor\fornecedorController@store']);
    Route::any('editar/{id}',['as'=>'edit','uses' => 'Fornecedor\fornecedorController@edit']);
    Route::any('atualizar',['as'=>'update','uses' => 'Fornecedor\fornecedorController@update']);
});  

Route::group(['as' => 'cliente.','prefix' => 'cliente', 'middleware' => ['auth']],function(){
    Route::get('/',['as'=>'index','uses' => 'cliente\clienteController@index']);
    Route::get('criar',['as'=>'create','uses' => 'cliente\clienteController@create']);
    Route::any('salvar',['as'=>'store','uses' => 'cliente\clienteController@store']);
    Route::any('editar/{id}',['as'=>'edit','uses'=>'cliente\clienteController@edit']);
    Route::any('atualizar',['as'=>'update','uses'=>'cliente\clienteController@update']);
});


Route::group(['as' => 'agenda.','prefix' => 'agenda', 'middleware' => ['auth']],function(){
    Route::any('/',['as' =>'index','uses' =>'agenda\agendaController@index']);
    Route::any('criar',['as' =>'create','uses' =>'agenda\agendaController@create']);
    Route::any('salvar',['as'=>'store','uses' => 'agenda\agendaController@store']);
    Route::any('editar/{id}',['as'=>'edit','uses' => 'agenda\agendaController@edit']);
    Route::any('atualizar',['as'=>'update','uses' => 'agenda\agendaController@update']);
    
    Route::any('calendario',['as' =>'calendario','uses' =>'agenda\calendarioController@Index']);
    Route::any('calendariojson',['as' =>'calendariojson','uses' =>'agenda\calendarioController@json']);
});

Route::any('/send', 'EmailController@send');
Route::any('/mail', 'EmailController@index');

Auth::routes();

