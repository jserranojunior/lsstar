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
      
/* UPDATE UNIDADE DE NEGOCIO */
        DB::table('area')
        ->where('nome', 'Terreno Vila Áurea')
        ->update(['nome' => 'Rua Edvaldo Pires']);

        DB::table('contas_a_pagar')
        ->where('area', 'Terreno Vila Áurea')
        ->update(['area' => 'Rua Edvaldo Pires']);

        DB::table('valor_contas_a_pagar')
        ->where('conta', 'Terreno Vila Áurea')
        ->update(['conta' => 'Rua Edvaldo Pires']);


      
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
