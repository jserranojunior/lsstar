<?php

namespace App\Models\tables;

use Illuminate\Database\Eloquent\Model;
use DB;

class valor_contas_a_pagar extends Model
{
   protected $table = "valor_contas_a_pagar";

   public function valorParaPagar($data, $contaId){

    $this->data = date('Y-m',strtotime($data));
    $this->id = $contaId;

    $this->valorParaPagar = DB::table($this->table)
    ->where('codigo', '=', $this->id)                
    ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '=', $this->data)
    ->orWhere('codigo', '=',  $this->id)
    ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '<=', $this->data)
    ->orderBy('id', 'desc')
    ->take(1)
    ->get();   
    
    // dd($this->valorParaPagar);
        return $this->valorParaPagar;   
    

    // public function valorVazio($data, $contaId, $valorAtual){
    //     $this->data = date('Y-m',strtotime($data));
    //     $this->id = $contaId;
    
    //     if($valorAtual > ''){
    //         return $valorAtual;
    //     }else{
    //         $this->valorParaPagar = DB::table($this->table)        
    //     ->Where('codigo', '=',  $this->id)
    //     ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '<', $this->data)
    //     ->orderBy('id','desc')  
    //     ->take(1)
    //     ->get();

    //         foreach($this->valorParaPagar as  $item){            
    //             return $item->valor;
    //         }
    //     }

        

          
    }
}
