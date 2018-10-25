<?php

namespace App\Models\v1\Tables;

use Illuminate\Database\Eloquent\Model;
use DB;

class contas_a_pagar extends Model
{
    protected $table = "contas_a_pagar";

    public function contasMensais($anoMes){
        $this->data = date('Y-m', strtotime($anoMes));
         
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
}