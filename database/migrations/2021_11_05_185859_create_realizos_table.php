<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealizosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('realizos', function (Blueprint $table) {
            $table->id();
            $table->time('hora');
            $table->unsignedBigInteger('idTrabajo');
            $table->unsignedBigInteger('idReporteT');
            
            $table->foreign('idTrabajo')->references('id')->on('trabajos')->onDelete('cascade'); 
            $table->foreign('idReporteT')->references('id')->on('reporte_t_s')->onDelete('cascade'); 
            
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
        Schema::dropIfExists('realizos');
    }
}
