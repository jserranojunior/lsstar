<?php

namespace App\Models\financeiro;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Models\tables\contas_a_pagar;
use App\Models\tables\valor_contas_a_pagar;

class relatorios extends Model
{

    public function __construct(contas_a_pagar $contas_a_pagar, valor_contas_a_pagar $valoresContasAPagar){
        $this->contasapagar = $contas_a_pagar;
        $this->valoresContasAPagar = $valoresContasAPagar;
    }

    public function contasAnuais($ano){
        $unidades = DB::table('area')
        ->select('nome','id')
        ->orderBy('ordem', 'asc')
        ->get();                

        $totalAno = 0;      
        $arrayMes = array('ano' => $ano);
        $arrayUnidade = array();
        $arrayValor = array();
        $arrayValorUnidade = array();    
        $arrayMeses = array();  
        $valorTotalMes = 0;  
        $novaSoma = 0;
           
       
        foreach($unidades as $unidade){  
            $id = $unidade->id;
            $unidade = $unidade->nome;
            $valorTotal = 0;
            $arrayMes = array(); 
            $arrayTotal = array(); 
            $arrayTotalMes = array();
            $valorTotalMes = 0;
            $somaTotalMesesUnidade = 0;
            
            for($mes = 1; $mes <= 12; $mes++){                  
                $mesano = "$ano-$mes";
                $mesbusca = date("Y-m",strtotime($mesano));
                $mesanoanterior = date($mesbusca,strtotime( "-1 month" ));               
                $contas = $this->contasapagar->valorMensal($unidade, $mesano);
                foreach($contas as $conta){              
                    $valoresContasAPagar = $this->valoresContasAPagar->valorParaPagar($mesano, $conta->id);
                    foreach($valoresContasAPagar as $valores){
                        $conta->valor = $valores->valor;
                        $conta->inicio_mes = $valores->inicio_mes;    
                    }                                                                              
                }

            $dataatual = date('Y-m');            
            if($mesbusca > $dataatual){               
                $valor = 0;
                $soma = 0;                
            }else{                
                $soma = $contas->sum('valor');                             
                $valor = number_format($soma, 2,',','.');           
            }
            $somaTotalMesesUnidade += $soma;
       
            array_push($arrayMes,array('valor' => $valor, 'mes' => $mes, 'unidade' => $unidade));     
            array_push($arrayMeses, $mes);
            }         
            
            $valorTotalMes += $somaTotalMesesUnidade;
            $valorTotalUnidade = number_format($somaTotalMesesUnidade,2,',','.');
            $totalAno += $valorTotal;                        
            
            $arrayDados['unidades'][$unidade]['unidade'] = $unidade;
            $arrayDados['unidades'][$unidade]['valor'] = $arrayMes;
            $arrayDados['unidades'][$unidade]['total'] = $valorTotalUnidade;           

            $arrayunidade[$unidade] = $arrayMes;
             $unidades->id = $arrayMes;        
        }     

        /* NOVA CONSULTA */ 
        for($mes = 1; $mes <= 12; $mes++){ 
            $mesano = "$ano-$mes";
        
        $contasNovaConsulta = $this->contasapagar->valorMensalSemUnidade($mesano);
                foreach($contasNovaConsulta as $conta){ 
                               
                    $valoresContasAPagar = $this->valoresContasAPagar->valorParaPagar($mesano, $conta->id);
                    foreach($valoresContasAPagar as $valores){
                        $conta->valor = $valores->valor;
                        $conta->inicio_mes = $valores->inicio_mes;    
                    }                                            
                }            

                $mesbusca = date("Y-m",strtotime($mesano));
                $dataatual = date('Y-m');            
                if($mesbusca > $dataatual){               
                    $soma = 0;                                  
                }else{                
                    $soma = $contasNovaConsulta->sum('valor');                         
                }
                $somaTotalConsultaMes  = number_format($soma,2,',','.'); 
                array_push($arrayTotalMes,array('mes' => $mes, 'valorTotal' => $somaTotalConsultaMes)); 
                $totalAno += $soma;
            }

    
        $totalAno = number_format($totalAno ,2,',','.');
        $arrayDados['totalano'] = $totalAno;
        $arrayDados['anoContas'] = $ano;
        $arrayDados['valores']['totalmes'] = $arrayTotalMes;        
        $arrayDados = collect($arrayDados);
        $dados = $arrayDados;
        
        return($dados);    
    }
}
