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

        DB::table('conta')
        ->where('nome', 'Portas Janelas e Vidro')
        ->update(['nome' => 'Porta Janela e Vidro']);

        DB::table('contas_a_pagar')
        ->where('contas', 'Portas Janelas e Vidro')
        ->update(['contas' => 'Porta Janela e Vidro']);

        DB::table('valor_contas_a_pagar')
        ->where('ccustos', 'Portas Janelas e Vidro')
        ->update(['ccustos' => 'Porta Janela e Vidro']);

        /*

        DB::table('conta')
        ->where('nome', 'Piso Revestimento Louças')
        ->update(['nome' => 'Piso Revest. Louças']);

        DB::table('contas_a_pagar')
        ->where('contas', 'Piso Revestimento Louças')
        ->update(['contas' => 'Piso Revest. Louças']);

        DB::table('valor_contas_a_pagar')
        ->where('ccustos', 'Piso Revestimento Louças')
        ->update(['ccustos' => 'Piso Revest. Louças']);

        */

        /*
        DB::table('valor_contas_a_pagar')
        ->update(['ccustos' => '']);
        

        DB::table('conta')
        ->delete();
        

        DB::table('contas_a_pagar')
        ->update(['contas' => '']);

        
        DB::table('conta')
        ->insert([
        ['nome' => 'Administração'],
        ['nome' => 'Portas Janelas e Vidro'],
        ['nome' => 'Alvenaria'],
        ['nome' => 'Concreto'],
        ['nome' => 'Elétrica'],
        ['nome' => 'Empreiteiro'],
        ['nome' => 'Hidráulica'],
        ['nome' => 'Aquisição'],
        ['nome' => 'Material Construção'],
        ['nome' => 'Pintura'],
        ['nome' => 'Piso Revestimento Louças'],
        ['nome' => 'Impostos e Taxas'],
        ['nome' => 'Água e Luz'],
        ]);


        


        DB::table('area')
        ->where('nome', 'Administração')
        ->update(['nome' => 'Administrativo']);

        DB::table('contas_a_pagar')
        ->where('area', 'Administração')
        ->update(['area' => 'Administrativo']);

   

        DB::table('area')
        ->where('nome', 'Júlio Pedro Pontes')
        ->update(['nome' => 'Rua Júlio Pedro Pontes']);

        DB::table('contas_a_pagar')
        ->where('area', 'Júlio Pedro Pontes')
        ->update(['area' => 'Rua Júlio Pedro Pontes']);

       
        DB::table('area')
        ->where('nome', 'Obras Asturias')
        ->update(['nome' => 'Jardim Asturias']);

        DB::table('contas_a_pagar')
        ->where('area', 'Obras Asturias')
        ->update(['area' => 'Jardim Asturias']);
*/



        /* ### CHANGE PAGADOR DE PAGAMENTOS PARA CONTA ###
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
*/
    /* ## ZERA PAGADOR DE CONTAS A PAGAR ##
       DB::table('contas_a_pagar')
        ->update(['pagador' => '']);
     */

    }
}
