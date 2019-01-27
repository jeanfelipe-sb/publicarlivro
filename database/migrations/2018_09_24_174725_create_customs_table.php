<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('customs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tamanho');
            $table->double('pb');
            $table->double('pc');
            $table->double('capa');
            $table->double('editoracao');
            $table->integer('ordem');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('customs');
    }

}
