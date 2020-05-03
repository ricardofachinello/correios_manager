<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Notificador', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('codigoRastreio',13);
            $table->string('emailContato',40)->nullable(false);
            $table->string('historicoLocal',2048);
            $table->timestamps();
            $table->unique('codigoRastreio');
            $table->primary('id');
            $table->foreign('id')->references('id')->on('Encomenda');
            $table->foreign('codigoRastreio')->references('codigoRastreio')->on('Encomenda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificadors');
    }
}
