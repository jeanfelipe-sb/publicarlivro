<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetosTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('projetos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('autores');
            $table->integer('paginas');
            $table->integer('pb');
            $table->integer('pc');
            $table->string('tamanho');
            $table->integer('exemplares');
            $table->string('endereco_entrega');
            $table->date('prazo')->nullable();
            $table->text('observacao')->nullable();
            $table->double('valor');
            $table->string('preco_sugerido');
            $table->text('notas')->nullable();
            $table->string('original_file')->nullable();
            $table->boolean('pago');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedInteger('status_projs_id');
            $table->foreign('status_projs_id')->references('id')->on('status_projs');
            $table->integer('statuspagseguro')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('projetos');
    }

}
