<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegresoEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regreso_equipos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->unsignedBigInteger('codigoPersonal');
            $table->unsignedBigInteger('idSalidaEquipo');

            $table->foreign('codigoPersonal')->references('codigo')->on('personals')->onDelete('cascade');
            $table->foreign('idSalidaEquipo')->references('id')->on('salida_equipos')->onDelete('cascade');
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
        Schema::dropIfExists('regreso_equipos');
    }
}
