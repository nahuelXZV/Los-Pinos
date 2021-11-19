<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoUrbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_urbs', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->time('hora');
            $table->string('motivo', 50);
            $table->unsignedBigInteger('idVivienda')->nullable();
            $table->unsignedBigInteger('idMotorizado')->nullable();

            $table->foreign('idVivienda')->references('id')->on('viviendas')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idMotorizado')->references('id')->on('motorizados')->onUpdate('cascade')
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
        Schema::dropIfExists('ingreso_urbs');
    }
}
