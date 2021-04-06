<?php

namespace App\Models\manutencao;
use Illuminate\Database\Eloquent\Model;
use DB;
use Symfony\Component\HttpFoundation\Request;

class manutencao extends Model
{
    
    
    public function index(){
        $select = DB::connection('vdlap')
                ->table('TBL_manutencao_orcamento')
                ->whereYear('dt_entrega', '=', '2016')
                ->whereMonth('dt_entrega', '=', '12')
                ->tosql();
        $select  = array('dados' => $select);
        dd($select);
        
    }
    
    
}
