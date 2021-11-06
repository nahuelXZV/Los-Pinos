<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteAcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_acs', function (Blueprint $table) {
            $table->id('codigo');
            $table->text('reporte',250);
            $table->unsignedBigInteger('codigoAC');
            $table->unsignedBigInteger('codigoRes');

            $table->foreign('codigoAC')->references('codigo')->on('area_comuns');
            $table->foreign('codigoRes')->references('codigo')->on('reservas');
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
        Schema::dropIfExists('reporte_acs');
    }
}
