<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesquisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesquisas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('curso');
            $table->string('semestre');
            $table->string('turma');
            $table->string('turno');
            $table->timestamps('realizada');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesquisas');
    }
}
