<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $select_pagador = DB::table('financeiro_pagamentos_feitos')
                        ->select('id_conta', 'pagador')
                        ->where('pagador','Nota Fiscal')
                        ->orWhere('pagador', 'Recibo')
                        ->get();   
       

        foreach($select_pagador as $feito){  
            $id = $feito->id_conta;
            $pagador = $feito->pagador;                                   

                DB::table('contas_a_pagar')
                ->where('id', $id)
                ->update(['pagador' => $pagador]);   
            

    }


            
            
                            

        /*
       DB::table('contas_a_pagar')
        ->update(['pagador' => '']);
     */

    }
}
