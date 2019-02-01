<?php

namespace App\Models\v1\Financeiro;

use Illuminate\Database\Eloquent\Model;
use App\Models\v1\Tables\contas_a_pagar;
use App\Models\v1\Tables\valor_contas_a_pagar;
use App\Models\v1\Tables\financeiro_pagamentos_feitos;
use App\Models\v1\Tables\unidades_negocio;
use App\Models\v1\Functions\DateFunction;

class ContasAPagar extends Model
{

    public function __construct(contas_a_pagar $conta, 
    DateFunction $DateFunction,
    valor_contas_a_pagar $valorContasAPagar,
    financeiro_pagamentos_feitos $pagamentosFeitos,
    unidades_negocio $unidades
    ){
        $this->contasAPagar = $conta;
        $this->unidades_negocio = $unidades;
        $this->dataFunctions = $DateFunction;
        $this->valorContasAPagar = $valorContasAPagar;
        $this->pagamentosFeitos = $pagamentosFeitos;
    }
    

    public function index($request){
       
        /* 
         /* Request Date */
        if($request->data > ''){
            $this->data = $request->data;
            }else{
            $this->data = date('Y-m');
        }
        if($request->diaInicial > ''){
            $diaInicial = $request->diaInicial;
        }else{
            $diaInicial = 1;
        }
        if($request->diaFinal > ''){
            $diaFinal = $request->diaFinal;
        }else{
            $diaFinal = 31;
        }                   

        $datas = $this->dataFunctions->financeiroIndex($this->data, $diaInicial, $diaFinal);

        /* End Request Date */


      
        $contas = $this->contasAPagar->contasMensais($this->data);  
        
        foreach($contas as $conta){              
            $valorContasAPagar = $this->valorContasAPagar->valorParaPagar($this->data, $conta->id); 
                                    
            foreach($valorContasAPagar as $valores){
                $conta->valor = $valores->valor;
                $conta->item = $valores->item;
                $conta->ccustos = $valores->ccustos;
                $conta->favorecido = $valores->favorecido;
                $conta->dia = date('d', strtotime($valores->inicio_mes));
                $conta->idValor = $valores->id;              
            }         
                   
            $pagamentoFeito = $this->pagamentosFeitos->pagamentoMensal($this->data, $conta->id);   

            foreach($pagamentoFeito as $pagamento){            
                $conta->valor_pago = $conta->valor;
                if($pagamento->tipo_pagamento == "Cheque"){
                    $pagamento->cor_tipo_pagamento = "#ffa303";
                }
                if($pagamento->tipo_pagamento == "Transferência"){
                    $pagamento->cor_tipo_pagamento = "#6f05d1";
                }
                $conta->cor_tipo_pagamento = $pagamento->cor_tipo_pagamento;
            }
        }    
        
        /* ####### FILTERS #####*/            
        
        //AREA
        if($request->area > ''){
            $contas = $contas->where('area','=', $request->area);
        }

        if($request->contasfiltro > ''){
            $contas = $contas->where('contas','=', $request->contasfiltro);
        }

        // DIA
        $contas = $contas->where('dia','>=', $diaInicial)->where('dia','<=', $diaFinal);

        if($request->tipo > ''){
            $contas = $contas->where('tipo', '=', $request->tipo);
        }

        if($request->pagador > ''){
            $contas = $contas->where('pagador', '=', $request->pagador);
        }

        $filtros = [
            'ordem' => $request->ordem,
            'area' => $request->area,
            'contasfiltro' => $request->contasfiltro,
            'pagador' => $request->pagador,
        ];

        // if($request->ordem > ''){                  
        //     $contas = $contas->sortBy($request->ordem); 
        // }else{
        //     $contas = $contas->sortBy('dia'); 
        // }

        $contas = $contas->toArray();                
                $contas = collect($contas);            
                $contas = $contas->sortBy('dia');
                $contas = $contas->values()->all();
                $contas = collect($contas);

       
        // dd($contas);
       
        $somaContas = $contas->sum('valor');
        $somaValorPago = $contas->sum('valor_pago');        
        $valorTotalPagar = $somaContas - $somaValorPago;

        //unidades
        $this->unidades_negocio = $this->unidades_negocio->all();
        
        $dados = ['datas' => $datas, 'contas' => $contas, 
        'total' => $somaContas, 'filtros' => $filtros, 
        'somaValorPago' => $somaValorPago, 
        'valorTotalPagar' => $valorTotalPagar,
        'unidades' => $this->unidades_negocio
    ];            

        

        return $dados;             

    }
}
