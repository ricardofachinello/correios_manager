<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEncomendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Encomenda', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('idusers');
            $table->string('codigoRastreio',13)->nullable(false);
            $table->string('nomeEncomenda',40)->nullable(false);
            $table->date('dataInclusao')->nullable(false);
            $table->string('emailContato')->nullable(false);
            $table->bigInteger('grupoid');
            $table->timestamps();
            $table->unique('codigoRastreio');
            $table->foreign('idusers')->references('id')->on('users');
            $table->foreign('grupoid')->references('id')->on('grupos');
        });
    }

    /**S
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('encomenda');
    }
}
