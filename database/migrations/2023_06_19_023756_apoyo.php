<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Apoyo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('apoyos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Text('nombre');
            $table->MediumText('descripcion');
            $table->Text('direccion');
            $table->BigInteger('telefono');
            $table->Text('correo');
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
