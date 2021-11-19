<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSacosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sacos', function (Blueprint $table) {
            $table->unsignedBigInteger('idSalidaEquipo');
            $table->unsignedBigInteger('codigoEquipo');
            $table->string('estadoSalida');

            $table->foreign('idSalidaEquipo')->references('id')->on('salida_equipos')->onDelete('cascade');
            $table->foreign('codigoEquipo')->references('codigo')->on('equipos')->onDelete('cascade');
           
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
        Schema::dropIfExists('sacos');
    }
}
