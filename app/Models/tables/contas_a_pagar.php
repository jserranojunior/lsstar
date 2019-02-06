<?php

namespace App\Models\tables;
use DB;
use Illuminate\Database\Eloquent\Model;


class contas_a_pagar extends Model
{
    protected $table = "contas_a_pagar";

   
    public function contasMensais($anoMes){
        $this->data = $anoMes;

        $this->data = date('Y-m', strtotime($this->data));   
         
        $this->contas = self::where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 
        ->where(DB::raw("SUBSTRING(fim_conta,1,7)"), '>=', $this->data)  
        ->orWhere('id' ,'>', '0')  
        ->where(DB::raw("SUBSTRING(fim_conta,1,7)"), '=', null)                                    
        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 
        ->orWhere(DB::raw("SUBSTRING(fim_conta,1,7)"), '=', '')                                
        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 
        ->get();
     
        return($this->contas);       
    }

    public function valorMensal($unidade, $anoMes){
        $this->data = date('Y-m',strtotime($anoMes));

        
         
        $this->contas = self::select('id','area','inicio_conta','fim_conta')
       
        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 
        ->where(DB::raw("SUBSTRING(fim_conta,1,7)"), '>=', $this->data)  
        ->where('area', $unidade)

        ->orWhere('area', $unidade)
        ->where(DB::raw("SUBSTRING(fim_conta,1,7)"), '=', null)                                    
        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 

        ->orWhere('area', $unidade)
        ->where(DB::raw("SUBSTRING(fim_conta,1,7)"), '=', '')                                
        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 
        
        ->get();

        
     
        return($this->contas);       
    }

    public function valorMensalSemUnidade($anoMes){
        $this->data = date('Y-m',strtotime($anoMes));       
         
        $this->contas = self::select('id')

        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 
        ->where(DB::raw("SUBSTRING(fim_conta,1,7)"), '>=', $this->data)

        ->orWhere('id' ,'>', '0') 
        ->where(DB::raw("SUBSTRING(fim_conta,1,7)"), '=', null)                                    
        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 

        ->orWhere(DB::raw("SUBSTRING(fim_conta,1,7)"), '=', '')                                
        ->where(DB::raw("SUBSTRING(inicio_conta,1,7)"), '<=', $this->data) 
        ->get();

        return($this->contas);       
    }


}
