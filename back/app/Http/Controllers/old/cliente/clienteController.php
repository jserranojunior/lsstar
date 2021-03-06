<?php

namespace App\Http\Controllers\cliente;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\ApiCliente;
use App\Models\tables\casas;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class clienteController extends Controller
{
    public function __construct(ApiCliente $ApiCliente, casas $casas){   
        $this->casas = $casas;     
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

        $casas = $this->casas::where('cliente_id', $id)->get();

        $data = ['dados' => $dados, 'casas' => $casas];
        return view('cliente/editar')->with($data);  

    }
}
