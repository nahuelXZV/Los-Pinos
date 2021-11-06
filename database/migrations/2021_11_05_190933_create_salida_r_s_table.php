<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_r_s', function (Blueprint $table) {
            $table->unsignedBigInteger('idResidente');
            $table->unsignedBigInteger('idSalidaUrb');
            $table->primary(['idResidente', 'idSalidaUrb']);

            $table->foreign('idResidente')->references('id')->on('residentes');
            $table->foreign('idSalidaUrb')->references('id')->on('salida_urbs');
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
        Schema::dropIfExists('salida_r_s');
    }
}
