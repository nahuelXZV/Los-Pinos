<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_v_s', function (Blueprint $table) {
            $table->unsignedBigInteger('idVisitante');
            $table->unsignedBigInteger('idIngresoUrb');
            $table->primary(['idVisitante', 'idIngresoUrb']);
            $table->foreign('idVisitante')->references('id')->on('visitantes');
            $table->foreign('idIngresoUrb')->references('id')->on('ingreso_urbs');
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
        Schema::dropIfExists('ingreso_v_s');
    }
}
