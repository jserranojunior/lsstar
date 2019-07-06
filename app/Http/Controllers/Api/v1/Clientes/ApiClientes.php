<?php

namespace App\Http\Controllers\Api\v1\Clientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\Clientes\Clientes;

class ApiClientes extends Controller
{
    public function __construct(Clientes $clientes){
        $this->clientes = $clientes;
    }

    public function index(Request $request)
    {
        $data = $this->clientes->Todos($request);        
        
        return response()->json([
            'data' => $data           
        ]);
      

    }


    public function create()
    {
        //
    }

    public function lasPalmas(){
                $this->clientes = $this->clientes::where('evento_palmas', 1)->get();
        return($this->clientes);
    }


    public function store(Request $request)
    {
        
        $this->clientes->cadastrar($request->all());


        
        return response()->json([
            'data' => $this->clientes           
        ]);
    }

 
    public function show($id)
    {
        //
    }

 
    public function edit($id)
    {
        $editar = $this->clientes;
        $dados = $editar->editar($id);
        return $dados;
    }

    public function update(Request $request, $id)
    {
         
        $atualizar = $this->clientes;
        $dados = $atualizar->atualizar($request);
    }

    public function destroy($id)
    {
        //
    }
}
