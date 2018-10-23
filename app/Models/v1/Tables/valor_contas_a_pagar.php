<?php

namespace App\Models\v1\Tables;
use DB;
use Illuminate\Database\Eloquent\Model;

class valor_contas_a_pagar extends Model
{
    protected $table = "valor_contas_a_pagar";

   public function valorParaPagar($data, $contaId){

    $this->data = $data;
    $this->id = $contaId;

    $this->valorParaPagar = DB::table($this->table)->where('codigo', $this->id)                
    ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '=', $this->data) 
    ->orWhere('codigo', $this->id)
    ->where(DB::raw("SUBSTRING(inicio_mes,1,7)"), '<=', $this->data) 
    ->take(1)
    ->get();   


        return $this->valorParaPagar;
    
}
}