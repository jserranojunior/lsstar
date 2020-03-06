<?php

use Illuminate\Database\Seeder;

class UnidadesNegocio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unidades_negocio')->insert([
                    ['name' => '01 - Administrativo'],
            ['name' => '02 - Diretoria'],
            ['name' => '03 - Rua Rio Grande'],
            ['name' => '04 - Rua Júlio Pedro Pontes'],
            ['name' => '05 - Rua Edvaldo Pires'],
            ['name' => '06 - Av. Adriano'],
            ['name' => '07 - Rua Arilene'],
            ['name' => '08 - Jardim Asturias'],
            ['name' => '09 - Chácara do JB'],
            ['name' => '10 - Rua São Paulo - Enseada'],
            ['name' => '11 - Attílio Gelsomini'],
        ]
        );
    }
}
