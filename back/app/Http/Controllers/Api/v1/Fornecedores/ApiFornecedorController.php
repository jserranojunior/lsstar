<?php

namespace App\Http\Controllers\Api\v1\Fornecedores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\Tables\fornecedor_contas_a_pagar;

class ApiFornecedorController extends Controller
{
    public function __construct(fornecedor_contas_a_pagar $fornecedores){
        $this->fornecedores = $fornecedores;
    }

    public function edit($id){
        $this->fornecedores = $this->fornecedores->edit($id);
        return($this->fornecedores);        
    }

    public function atualizar(Request $request, $id){
        $this->fornecedores = $this->fornecedores->atualizar($request, $id);
        return($this->fornecedores);
    }

    public function store(Request $request){                 
            $cadastrar = $this->fornecedores->store($request);
            return($cadastrar);              
    }

    public function index(){
        $this->fornecedores = $this->fornecedores->index();
        return($this->fornecedores);
    }
}
