<?php

namespace App\Http\Controllers\Api\v1\Financeiro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\v1\Tables\financeiro_pagamentos_feitos;
use App\Models\v1\Tables\valor_contas_a_pagar;

class ApiEmitirPagamentoController extends Controller
{
 
    public function __construct(financeiro_pagamentos_feitos $pagamentosFeitos, valor_contas_a_pagar $valoresAPagar){
        $this->pagamentosFeitos = $pagamentosFeitos;
        $this->valoresAPagar = $valoresAPagar;
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
        // return $request;
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

        foreach($this->pagamentosFeitos as $pagamento){        
            $this->valores = $this->valoresAPagar->where('codigo', $pagamento->id_conta)->take(1)->get();            
            foreach($this->valores as $valor){             
                $pagamento->favorecido = $valor->favorecido;
            }            
        }
       
        return response()->json([
            'data' => $this->pagamentosFeitos,
            'message' => 'Editando'  
        ]);
        }catch(Exception $e){
            return response()->json([
                'data' => $e,  
            ]);
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
