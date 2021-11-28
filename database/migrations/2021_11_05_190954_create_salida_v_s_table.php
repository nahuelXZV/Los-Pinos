<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalidaVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_v_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idVisitante');
            $table->unsignedBigInteger('idSalidaUrb');
            $table->foreign('idVisitante')->references('id')->on('visitantes')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idSalidaUrb')->references('id')->on('salida_urbs')->onUpdate('cascade')
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
        Schema::dropIfExists('salida_v_s');
    }
}
