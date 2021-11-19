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
            $table->id();
            $table->text('reporte', 250);
            $table->unsignedBigInteger('codigoAC');
            $table->unsignedBigInteger('codigoRes');

            $table->foreign('codigoAC')->references('codigo')->on('area_comuns')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('codigoRes')->references('id')->on('reservas')->onUpdate('cascade')
                ->onDelete('cascade');
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
