<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('loginusers',30);
            $table->string('email')->nullable(false);
            $table->string('senhausers',80)->nullable(false);
            $table->date('dataNascimento')->nullable(false);
            $table->string('enderecousers',255)->nullable(false);
            $table->rememberToken();
            $table->timestamps();
            $table->unique('loginusers');
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
