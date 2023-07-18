<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Formulario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('formulario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('encuestas_id');
            $table->foreign('encuestas_id')->references('id')->on('encuestas')->onDelete('cascade');
            $table->unsignedBigInteger('preguntas_id');
            $table->foreign('preguntas_id')->references('id')->on('preguntas')->onDelete('cascade');
            $table->unsignedBigInteger('respuesta_id');
            $table->foreign('respuesta_id')->references('id')->on('repuestas')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        //
    }
}
