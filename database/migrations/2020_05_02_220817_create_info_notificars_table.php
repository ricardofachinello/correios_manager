<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoNotificarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infoNotificar', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('historicoLocal',4096);
            $table->timestamps();
            $table->primary('id');
            $table->foreign('id')->references('id')->on('Encomenda');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_notificars');
    }
}
