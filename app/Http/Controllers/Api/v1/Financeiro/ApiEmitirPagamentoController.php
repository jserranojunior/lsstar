<?php

namespace App\Http\Controllers\Api\v1\Financeiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\Tables\financeiro_pagamentos_feitos;

class ApiEmitirPagamentoController extends Controller
{
 
    public function __construct(financeiro_pagamentos_feitos $pagamentosFeitos){
        $this->pagamentosFeitos = $pagamentosFeitos;
    } 

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }
    
    public function store(Request $request)
    {        
        $this->pagamentosFeitos = $this->pagamentosFeitos->emitirPagamento($request);
        return $this->pagamentosFeitos;
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try{
        $this->pagamentosFeitos = $this->pagamentosFeitos->where('numero_cheque', $id)->get();

        return response()->json([
            'data' => $this->pagamentosFeitos,
            'message' => 'Editando'  
        ]);
        }catch(Exception $e){
            return response()->json([
                'data' => '',
                'message' => $e,     
            ]);
            
            return $e;
        }
    }

    
    public function update(Request $request, $id)
    {
        //
    }

 
    public function destroy(Request $request)
    {
        $cheque = $request['cheque'];
        try{
            $this->pagamentosFeitos = $this->pagamentosFeitos::where('numero_cheque', $cheque)->delete();
            // $this->pagamentosFeitos = $request['cheque'];
            return response()->json([
                'data' => $this->pagamentosFeitos,
                'message' => 'Excluido'  
            ]);
            }catch(Exception $e){
                return response()->json([
                    'data' => '',
                    'message' => $e,     
                ]);
                
                return $e;
            }
    }
}
