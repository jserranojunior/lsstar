<?php

namespace App\Http\Controllers\cliente;

use Illuminate\Http\Request;
use App\Models\cliente\cliente;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class clienteController extends Controller
{
    public function update(Request $request){
        
        $dados = new cliente();
        $update = $dados->atualizar($request);
        return redirect('cliente/'); 
           
    }

    public function index(){
        $index = new cliente();
        $dados = $index->index();
       
        return view('cliente/todos')->with($dados);
      
    }

    public function create(){
        return view('cliente/criar');
        
    }
    public function store(Request $request){
   
        $salvar = new cliente();
        $salvar =  $salvar->salvar($request);
        return redirect('cliente/'); 
    }

    public function edit($id){
        $editar = new cliente();
        $dados = $editar->editar($id);
        return view('cliente/editar')->with($dados);
       
    }
}
