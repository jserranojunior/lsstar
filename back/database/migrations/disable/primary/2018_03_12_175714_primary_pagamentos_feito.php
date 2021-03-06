<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PrimaryPagamentosFeito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('financeiro_pagamentos_feitos', function (Blueprint $table) {
            $table->primary('id')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('financeiro_pagamentos_feitos', function (Blueprint $table) {
            //
        });
    }
}
