<?php

namespace App\Models\v1\Tables;

use Illuminate\Database\Eloquent\Model;
use DB;

class financeiro_pagamentos_feitos extends Model
{
    protected $table = "financeiro_pagamentos_feitos";

    public function pagamentoMensal($data,$id){
        $this->data = $data;
        $this->id = $id;    
        $this->pagamentoFeito = self::where(DB::raw("SUBSTRING(mes_referencia,1,7)"), '=', $this->data)      
        ->Where('id_conta', $this->id)
        ->take(1)
        ->get();  
        return $this->pagamentoFeito;
    }

    public function emitirPagamento($request){
        
        $dados = [
            'id_conta' => $request->id,
            'mes_referencia' => $request->data,
            'data_conta' => $request->data,
            'valor_pago' => $request->valor,
            'tipo_pagamento' => $request->tipo_pagamento,
            'numero_cheque' => $request->numero_cheque,
            'link_comprovante' => '',
        ];              

        
        DB::table($this->table)->insert($dados);

        return('Pagamento Feito');
        // return("$id, $data, $valor");
    }

    
}
