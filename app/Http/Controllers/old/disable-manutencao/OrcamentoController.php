<?php

namespace App\Http\Controllers\manutencao;

use Illuminate\Http\Request;
use App\Models;
use App\Models\manutencao;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrcamentoController extends Controller
{
    public function Index(){
        
        $stock = new \App\Models\manutencao\manutencao();
        $dados = $stock->index();
    }
}
