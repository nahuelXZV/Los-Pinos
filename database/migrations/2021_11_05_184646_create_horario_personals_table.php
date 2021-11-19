<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorarioPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_personals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idHorario');
            $table->unsignedBigInteger('codigoPersonal');

            $table->foreign('idHorario')->references('id')->on('horarios')->onDelete('cascade');
            $table->foreign('codigoPersonal')->references('codigo')->on('personals')->onDelete('cascade');
            
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
        Schema::dropIfExists('horario_personals');
    }
}
