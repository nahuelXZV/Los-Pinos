<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50);
            $table->char('sexo', 1);
            $table->string('nroCarnet', 10);
            $table->string('telefono', 10);
            $table->string('tipoResidente', 20);
            $table->unsignedBigInteger('idVivienda')->nullable();

            $table->foreign('idVivienda')->references('id')->on('viviendas');

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
        Schema::dropIfExists('residentes');
    }
}
