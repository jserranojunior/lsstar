<?php

namespace App\Models\v1\Financeiro;

use Illuminate\Database\Eloquent\Model;
use App\Models\v1\Tables\contas_a_pagar;
use App\Models\v1\Tables\valor_contas_a_pagar;
use App\Models\v1\Tables\financeiro_pagamentos_feitos;
use App\Models\v1\Functions\DateFunction;

class ContasAPagar extends Model
{

    public function __construct(contas_a_pagar $conta, 
    DateFunction $DateFunction,
    valor_contas_a_pagar $valorContasAPagar,
    financeiro_pagamentos_feitos $pagamentosFeitos
    ){
        $this->contasAPagar = $conta;
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
            $pagamentoFeito = $this->pagamentosFeitos->pagamentoMensal($this->data, $conta->id);               
            
            foreach($valorContasAPagar as $valores){
                $conta->valor = $valores->valor;
                $conta->item = $valores->item;
                $conta->ccustos = $valores->ccustos;
                $conta->favorecido = $valores->favorecido;
                $conta->dia = date('d', strtotime($valores->inicio_mes));                    
            }

            

            foreach($pagamentoFeito as $pagamento){

                $pagamento->valor_pago = str_ireplace(".","",$pagamento->valor_pago); //remove o separador de milhares
                $pagamento->valor_pago = str_ireplace(",",".",$pagamento->valor_pago); //substitui a virgula por ponto 

                $conta->valor_pago = $pagamento->valor_pago;

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
        if($request->ordem > ''){
            $contas = $contas->sortBy($request->ordem);
        }
        if($request->area > ''){
            $contas = $contas->where('area','=', $request->area);
        }
        $filtros = [
            'ordem' => $request->ordem,
            'area' => $request->area,
        ];
        /* END FILTERS */

        // $contas = $contas->values()->all();

       
        $somaContas = $contas->sum('valor');
        $somaValorPago = $contas->sum('valor_pago');

        // $somaContas = str_ireplace(".","",$somaContas); //remove o separador de milhares
        // $somaContas = str_ireplace(",",".",$somaContas); //substitui a virgula por ponto  
        
       
                                

        $valorTotalPagar = $somaContas - $somaValorPago;

        // $dados = ['contas' => $contas, 'total' => $somaContas];            
        $dados = ['datas' => $datas, 'contas' => $contas, 'total' => $somaContas, 'filtros' => $filtros, 'somaValorPago' => $somaValorPago, 'valorTotalPagar' => $valorTotalPagar];            
        // $data = ['data' => $dados];
        return $dados;       
        

    }
}
