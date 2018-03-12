<?php

namespace App\Http\Controllers\Financeiro;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\financeiro\faturaconsolidada;


class faturaConsolidadaController extends Controller {

    public function index() {
      
       $dados = new faturaconsolidada();
       $dados = $dados->index();
       
       return view('financeiro.faturaconsolidada')->with($dados);
 }
    
    
    
    public function dd() {
     
       $dados = new faturaconsolidada();
       $dados = $dados->index();
       dd($dados);
       return view('financeiro.faturaconsolidada')->with($dados);

        
    }
    
    
    
    
    
    

}
