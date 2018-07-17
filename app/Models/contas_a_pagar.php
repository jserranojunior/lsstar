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
     

        return($this->contas);
    }
}
