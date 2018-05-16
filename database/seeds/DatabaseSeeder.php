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
        /* UPDATE AREA */

        $areas = DB::table('area')
        ->orderBy('ordem', 'asc')
        ->get();

       foreach($areas as $area){


        if($area->ordem == 1){
                $area->ordem = "01";
        }
        if($area->ordem == 2){
                $area->ordem = "02";
        }
        if($area->ordem == 3){
                $area->ordem = "03";
        }
        if($area->ordem == 4){
                $area->ordem = "04";
        }
        if($area->ordem == 5){
                $area->ordem = "05";
        }
        if($area->ordem == 6){
                $area->ordem = "06";
        }
        if($area->ordem == 7){
                $area->ordem = "07";
        }
        if($area->ordem == 8){
                $area->ordem = "08";
        }
        if($area->ordem == 9){
                $area->ordem = "09";
        }
          
                $novoNome = "$area->ordem - $area->nome";               

               DB::table('contas_a_pagar')
               ->where('area', $area->nome)
               ->update(['area' => $novoNome]);
       
               DB::table('valor_contas_a_pagar')
               ->where('conta', $area->nome)
               ->update(['conta' => $novoNome]);
       
       }

       foreach($areas as $area){


        if($area->ordem == 1){
                $area->ordem = "01";
        }
        if($area->ordem == 2){
                $area->ordem = "02";
        }
        if($area->ordem == 3){
                $area->ordem = "03";
        }
        if($area->ordem == 4){
                $area->ordem = "04";
        }
        if($area->ordem == 5){
                $area->ordem = "05";
        }
        if($area->ordem == 6){
                $area->ordem = "06";
        }
        if($area->ordem == 7){
                $area->ordem = "07";
        }
        if($area->ordem == 8){
                $area->ordem = "08";
        }
        if($area->ordem == 9){
                $area->ordem = "09";
        }
          
                $novoNome = "$area->ordem - $area->nome";               

                DB::table('area')
                ->where('nome', $area->nome)
                ->update(['nome' => $novoNome]);
       
       }
/*
 


            /* UPDATE CONTAS AND CUSTOS */
            /*
            DB::table('contas_a_pagar')
            ->where('contas', 'Administração')
            ->update(['contas' => '01 - Administração']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Administração')
            ->update(['ccustos' => '01 - Administração']);
        
            DB::table('contas_a_pagar')
            ->where('contas', 'Diretoria')
            ->update(['contas' => '02 - Diretoria']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Diretoria')
            ->update(['ccustos' => '02 - Diretoria']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Engenh. Arquiteto')
            ->update(['contas' => '03 - Engenh. Arquiteto']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Engenh. Arquiteto')
            ->update(['ccustos' => '03 - Engenh. Arquiteto']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Impostos e Taxas')
            ->update(['contas' => '04 - Impostos e Taxas']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Impostos e Taxas')
            ->update(['ccustos' => '04 - Impostos e Taxas']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Água e Luz')
            ->update(['contas' => '05 - Água e Luz']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Água e Luz')
            ->update(['ccustos' => '05 - Água e Luz']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Empreiteiro')
            ->update(['contas' => '06 - Empreiteiro']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Empreiteiro')
            ->update(['ccustos' => '06 - Empreiteiro']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Material Construção')
            ->update(['contas' => '07 - Material Construção']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Material Construção')
            ->update(['ccustos' => '07 - Material Construção']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Estrutural')
            ->update(['contas' => '08 - Estrutural']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Estrutural')
            ->update(['ccustos' => '08 - Estrutural']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Alvenaria')
            ->update(['contas' => '09 - Alvenaria']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Alvenaria')
            ->update(['ccustos' => '09 - Alvenaria']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Hidráulica')
            ->update(['contas' => '10 - Hidráulica']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Hidráulica')
            ->update(['ccustos' => '10 - Hidráulica']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Elétrica')
            ->update(['contas' => '11 - Elétrica']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Elétrica')
            ->update(['ccustos' => '11 - Elétrica']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Piso Revest. Louças')
            ->update(['contas' => '12 - Piso Revest. Louças']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Piso Revest. Louças')
            ->update(['ccustos' => '12 - Piso Revest. Louças']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Porta Janela e Vidro')
            ->update(['contas' => '13 - Porta Janela e Vidro']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Porta Janela e Vidro')
            ->update(['ccustos' => '13 - Porta Janela e Vidro']);

            DB::table('contas_a_pagar')
            ->where('contas', 'Pintura')
            ->update(['contas' => '14 - Pintura']);
            DB::table('valor_contas_a_pagar')
            ->where('ccustos', 'Pintura')
            ->update(['ccustos' => '14 - Pintura']);

      */


/* UPDATE UNIDADE DE NEGOCIO */
/*
        DB::table('area')
        ->where('nome', 'Terreno Vila Áurea')
        ->update(['nome' => 'Rua Edvaldo Pires']);

        DB::table('contas_a_pagar')
        ->where('area', 'Terreno Vila Áurea')
        ->update(['area' => 'Rua Edvaldo Pires']);

        DB::table('valor_contas_a_pagar')
        ->where('conta', 'Terreno Vila Áurea')
        ->update(['conta' => 'Rua Edvaldo Pires']);

*/
      
/* INSERT AREA
        DB::table('area')
        ->insert([
        ['nome' => 'Chácara do JB']]);     
*/

/* INSERT CONTA      
        DB::table('conta')
        ->where('nome', 'Engenheiro')
        ->update(['nome' => 'Engenh. Arquiteto']);
*/

    }
}
