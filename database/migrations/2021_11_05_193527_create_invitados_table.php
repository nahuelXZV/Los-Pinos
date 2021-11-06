<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitados', function (Blueprint $table) {
            $table->unsignedBigInteger('idVisitante');
            $table->unsignedBigInteger('codigoRes');
            $table->primary(['idVisitante', 'codigoRes']);
            $table->foreign('idVisitante')->references('id')->on('visitantes');
            $table->foreign('codigoRes')->references('codigo')->on('reservas');
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
        Schema::dropIfExists('invitados');
    }
}
