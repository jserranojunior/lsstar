<?php

namespace App\Models\financeiro;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class faturaconsolidada extends Model
{
    public function index(){
        
        
        
        $ano = '2015';
        $data = "$ano-10";
        
        $dados = array();
        $arrayMes = array();
        $arrayCodigo = array();

        $faturas = DB::connection('vdlap')
                ->table('TBL_unidades as U')
                ->select('U.nm_sigla', 'U.cd_codigo')
                ->where('tipo_und', '=', '1')
                ->where('nm_unidade_nome', '<>', '')
                ->where('dt_final', '>', '2016-06-01')
                ->distinct()
                ->get();
                
           

        $faturas = $faturas->toArray();
        for ($count = 1; $count <= 12; $count++) {
            
                $data = date("Y-m", strtotime(date("Y-m", strtotime($data)) . "+1 month"));

                $totalGeralSoma = 0;    
                $totalGeralProcedimentos = 0;
                $i = 0;
                
                foreach ($faturas as $fatura) {
                $codigo = $fatura->cd_codigo;
                $sigla = $fatura->nm_sigla;
               
                
                
                $i += 1;
                
                $mes = substr($data, -2);
                $ano = substr($data, 0, -3);
                
                
                 if($codigo !== "20"){
                     
                     $quantidadeProcedimentos = DB::connection('vdlap')
                        ->table('TBL_protocolo')
                        ->where('A053_codung', '=', $codigo)
                        ->whereMonth('a002_datpro', $mes)
                        ->whereYear('a002_datpro', $ano)
                        ->count();
                
                 }else{
                    $dataAnterior = date("Y-m",strtotime(date("Y-m", strtotime($data)) . "+1 month"));
                            
                    
                $quantidadeProcedimentos = DB::connection('vdlap')
                        ->table('TBL_protocolo')
                        ->where('A053_codung', '=', $codigo)
                        ->where(DB::raw("SUBSTRING(a002_datpro,1,7)"), '=', $dataAnterior)
                        ->where('a056_codrac', '=', '12')
                        ->count();
                
                $segundoQuantidadeProcedimentos = DB::connection('vdlap')
                        ->table('TBL_protocolo')
                        ->where('A053_codung', '=', $codigo)
                        ->where(DB::raw("SUBSTRING(a002_datpro,1,7)"), '=', $dataAnterior)
                        ->where('a056_codrac', '=', '13')
                        ->count();
                }
                 
                $valorProcedimentos = DB::table('unidades_valores_procedimentos')
                ->where('cd_unidade','=',$codigo)
                ->where(DB::raw("SUBSTRING(data,1,7)"), '<=', $data)
                ->get();
                
                
                
                 foreach ($valorProcedimentos as $valorProcedimento){
                 
                 $desconto = $valorProcedimento->desconto;
        
                 $nmValor = $valorProcedimento->nm_valor;
                 $nmValor = number_format($nmValor,2,',','.');
                 
                 $nmSegundoValor = $valorProcedimento->nm_segundo_valor;
                 $nmSegundoValor = number_format($nmSegundoValor,2,',','.');
                 
                }
                
                /* VERIFICA SE EXISTE VALOR EDITADO */
                
                $ProcedimentoAdicionado = DB::table('unidades_quantidades_procedimentos')
                ->where('cd_unidade','=',$codigo)
                ->where(DB::raw("SUBSTRING(data,1,7)"), '<=', $data)
                ->get();
                
                
                
                foreach($ProcedimentoAdicionado as $addProcedimento){
                  if($addProcedimento->quantidade > ''){
                      
                  $quantidadeProcedimentos = $addProcedimento->quantidade;
                  
                  }
                }
                
                
                /* VERIFICA SE EXISTE VALOR EDITADO */
                
                if($codigo == "14"){
                    $quantidadeProcedimentos = $quantidadeProcedimentos/2;
                    $segundoQuantidadeProcedimentos = $quantidadeProcedimentos;
                }
                
                if($codigo != "20" and $codigo != "14" ){
                    $segundoQuantidadeProcedimentos = '';
                    
                }
                
                $primeiraSomavalor = $nmValor * $quantidadeProcedimentos;
                $primeiraSomavalorFormatado = number_format($primeiraSomavalor,2,',','.');
                
                
                $segundaSomavalor = $nmSegundoValor * $segundoQuantidadeProcedimentos;
                $segundaSomavalorFormatado = number_format($segundaSomavalor,2,',','.');
                
                $totalProcedimentos =  $quantidadeProcedimentos + $segundoQuantidadeProcedimentos;
                $totalSoma =   $primeiraSomavalor  + $segundaSomavalor;
                    
                
                $totalGeralProcedimentos += $totalProcedimentos;
                
                /*DESCONTO*/
                
                $ultimocaractere = substr($desconto,-1);
                
                
                if($ultimocaractere == "%"){
                $totalDesconto = $desconto * $totalSoma / 100;
                $totalSoma = $totalSoma - $totalDesconto;
                }else{
                    $totalDesconto = $desconto;
                   $totalSoma = $totalSoma - $totalDesconto; 
                }
                
                $totalGeralSoma += $totalSoma;
                $totalSomaFormatado = number_format($totalSoma,2,',','.');
                $totalGeralSomaFormatado = number_format($totalGeralSoma,2,',','.');
                
                
                
                $primeiraLinha = array('primeiraSomavalor'=>$primeiraSomavalorFormatado,'quantidadeProcedimentos' => $quantidadeProcedimentos,'nmValor'=>$nmValor);
                $segundaLinha = array('segundaSomavalor'=> $segundaSomavalorFormatado,'quantidadeProcedimentos' => $segundoQuantidadeProcedimentos,'nmSegundoValor'=>$nmSegundoValor);
                
                
                
                if($codigo == "14"){
                    $rowspan = 4;
                }elseif($codigo == "20"){
                    $rowspan = 5;
                }
                else{
                    $rowspan = 3;
                }
                
                $arrayCodigo[$codigo] = array('desconto'=>$desconto,'totalDesconto'=>$totalDesconto, 'totalSoma'=>$totalSomaFormatado, 'totalProcedimentos'=>$totalProcedimentos,'codigo' => $codigo,'unidade'=>$sigla,'segundaLinha' => $segundaLinha,'primeiraLinha' => $primeiraLinha,'i'=>$i,'rowspan' => $rowspan);
            }
            
       
            
            
            switch ($count) {
        case "01":    $mes = 'Janeiro';     break;
        case "02":    $mes = 'Fevereiro';   break;
        case "03":    $mes = 'Março';       break;
        case "04":    $mes = 'Abril';       break;
        case "05":    $mes = 'Maio';        break;
        case "06":    $mes = 'Junho';       break;
        case "07":    $mes = 'Julho';       break;
        case "08":    $mes = 'Agosto';      break;
        case "09":    $mes = 'Setembro';    break;
        case "10":    $mes = 'Outubro';     break;
        case "11":    $mes = 'Novembro';    break;
        case "12":    $mes = 'Dezembro';    break; 
 }
            
           
            $arrayMes[$count] = array('totalGeralSoma'=>$totalGeralSomaFormatado,'totalGeralProcedimentos' => $totalGeralProcedimentos,'nomeMes'=>$mes ,'dadosFaturas' =>$arrayCodigo);
            
        }
        
        
       
        $arrayMes = (object) $arrayMes;
        $dados = array(
        'dados' =>$arrayMes);
      
      
      
      return($dados);
     
        
        
    }
}
