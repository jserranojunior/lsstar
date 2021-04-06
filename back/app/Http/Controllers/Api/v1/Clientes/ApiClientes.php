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
                $this->clientes = $this->clientes->lasPalmasIndex();
                // return($this->clientes);
                $this->clientes = $this->clientes->sortBy('nome');
                return response()->json([
                    'data' => $this->clientes           
                ]);
        
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
        try{
        $atualizar = $this->clientes;
        $atualizar = $atualizar->atualizar($request);

        return response()->json([
            'data' => $atualizar          
        ]);
        }catch(Exception $e ){
            return response()->json([
                'data' => $e,  
            ]);
        }
    }

    public function destroy($id)
    {
        //
    }
}
