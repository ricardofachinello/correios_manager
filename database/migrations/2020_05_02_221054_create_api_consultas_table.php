<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apiConsulta', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('historicoLocal',2048);
            $table->timestamps();
            $table->primary('id');
            $table->foreign('id')->references('id')->on('Notificador');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_consultas');
    }
}
