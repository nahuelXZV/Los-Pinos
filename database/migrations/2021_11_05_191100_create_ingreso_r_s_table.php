<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoRSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_r_s', function (Blueprint $table) {
            $table->unsignedBigInteger('idResidente');
            $table->unsignedBigInteger('idIngresoUrb');
            $table->primary(['idResidente', 'idIngresoUrb']);
            $table->foreign('idResidente')->references('id')->on('residentes')->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('ingreso_r_s');
    }
}
