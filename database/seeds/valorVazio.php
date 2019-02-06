<?php

use Illuminate\Database\Seeder;

class valorVazio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('valor_contas_a_pagar')
        ->where('valor','')
        ->update(['valor' => 0]);
    }
}
