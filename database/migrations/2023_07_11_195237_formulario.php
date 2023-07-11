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
            $table->unsignedBigInteger('ponderacion_id');
            $table->foreign('ponderacion_id')->references('id')->on('ponderaciones')->onDelete('cascade');
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
