<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAlvaraColluns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('casas', function (Blueprint $table) {
            $table->string('numero_matricula')->nullable();
            $table->string('data_matricula')->nullable();
            $table->string('cep')->nullable();
            $table->string('bairro')->nullable();
            $table->string('numero_instalacao_luz')->nullable();
            $table->string('fornecedor_luz')->nullable();
            $table->string('numero_iptu')->nullable();
            $table->string('numero_habitese')->nullable();
            $table->string('data_habitese')->nullable();
            $table->string('alvara')->nullable();
            $table->string('data_alvara')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('casas', function (Blueprint $table) {
            //
        });
    }
}
