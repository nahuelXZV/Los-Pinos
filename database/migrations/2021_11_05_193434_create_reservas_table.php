<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id('codigo');
            $table->date('fecha');
            $table->time('horaIni');
            $table->time('horaFin');
            $table->integer('cantsPers')->nullable();
            $table->unsignedBigInteger('idResidente');
            $table->unsignedBigInteger('codigoAC');

            $table->foreign('idResidente')->references('id')->on('residentes');
            $table->foreign('codigoAC')->references('codigo')->on('area_comuns');
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
        Schema::dropIfExists('reservas');
    }
}
