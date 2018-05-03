<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;



class contas_a_pagar extends Model
{
    protected $table = "contas_a_pagar";


    public function contaMensal($anoMes){
        $this->contas =  self::where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $anoMes)
        ->where(DB::raw("SUBSTRING(fim_conta,1,7)"), '>=', $anoMes)
        ->orWhere('fim_conta','=','')
        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $anoMes)                            
        ->get();   
     
/*
            foreach($this->contas as $conta){
                $valoresContasAPagar = $this->valor_contas_a_pagar::where('codigo', $conta->id) 
                ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '=', $anoMes)      
                ->orWhere('codigo', $conta->id)
                ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '<=', $anoMes)      
                ->take(1)
                ->select('valor')
                ->get();
                
                foreach($valoresContasAPagar as $valores){
                    $valores->valor = str_ireplace(".","",$valores->valor); //remove o separador de milhares
                    $valores->valor = str_ireplace(",",".",$valores->valor); //substitui a virgula por ponto   
                    $conta->valor =  $valores->valor;
                                
                }
            }
            */

        return($this->contas);
    }
}
