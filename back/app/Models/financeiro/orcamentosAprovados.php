<?php

namespace App\Models\financeiro;

use Illuminate\Database\Eloquent\Model;
use DB;

class orcamentosAprovados extends Model{

   public $soma;
   
   function __construct(){

        /*
        $this->soma = DB::connection('vdlap')->table('TBL_manutencao_orcamento')
                ->where('cd_status','=','0')
                ->where('dt_entrega','>','')
                ->whereNull('inserido')
                ->count();
        */
     
    }
}