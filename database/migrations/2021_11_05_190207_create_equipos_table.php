<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('nombre');
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->unsignedSmallInteger('stock')->nullable();
            $table->unsignedSmallInteger('stockFaltante')->nullable();
            $table->string('multiplicidad');
            $table->string('descripcion')->nullable();
            $table->string('estadoServicio');
            $table->string('estadoFuncionamiento');
            $table->unsignedBigInteger('idAlmacen');

            $table->foreign('idAlmacen')->references('id')->on('almacens')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('equipos');
    }
}
