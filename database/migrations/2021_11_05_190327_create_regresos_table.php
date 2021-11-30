<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idRegresoEquipo');
            $table->unsignedBigInteger('codigoEquipo');
            $table->string('estadoDevolucion');

            $table->foreign('idRegresoEquipo')->references('id')->on('regreso_equipos')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('codigoEquipo')->references('codigo')->on('equipos')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('regresos');
    }
}
