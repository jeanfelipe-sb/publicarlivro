<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToTableUsers extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cpf');
            $table->string('sobrenome');
            $table->string('endereco');
            $table->string('ddd');
            $table->string('telefone_principal');
            $table->string('telefone')->nullable();
            $table->string('cep');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado');
            $table->integer('numero');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['cpf', 'sobrenome', 'endereco','telefone', 'cep', 'cidade', 'estado']);
        });
    }

}
