<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('planos', function (Blueprint $table) {
            $table->integer('id');
            $table->string('nome');
            $table->string('pb');
            $table->string('pc');
            $table->integer('paginas');
            $table->string('tamanho');
            $table->integer('exemplares');
            $table->double('preco_total');
            $table->integer('qtd_parcelas');
            $table->string('valor_parcelas');
            $table->string('sigla');
            $table->boolean('pg_coloridas');
            $table->integer('prazo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('planos');
    }

}
