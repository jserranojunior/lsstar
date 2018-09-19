<?php

namespace App\Http\Controllers\cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiCliente;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class clienteController extends Controller
{
    public function __construct(ApiCliente $ApiCliente){        
        $this->cliente = $ApiCliente;
    }

    public function update(Request $request){      
        $update = $this->cliente->update($request);
        return redirect('cliente/');            
    }

    public function index(Request $request){
        $dados = $this->cliente->index($request);       
        return view('cliente/todos')->with($dados);      
    }

    public function create(){
        return view('cliente/criar');        
    }

    public function store(Request $request){   
        $store =  $this->cliente->store($request);
        return redirect('cliente/'); 
    }

    public function edit($id){
        $dados =  $this->cliente->edit($id);
        return view('cliente/editar')->with($dados);       
    }
}
