<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_personals', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->unsignedBigInteger('retraso');
            $table->unsignedBigInteger('idReporteA');

            $table->foreign('idReporteA')->references('id')->on('reporte_a_s')->onDelete('cascade');
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
        Schema::dropIfExists('ingreso_personals');
    }
}
