<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotorizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorizados', function (Blueprint $table) {
            $table->id();
            $table->string('placa', 10);
            $table->string('descripcion', 200)->nullable();
            $table->unsignedBigInteger('idResidente')->nullable();
            $table->unsignedBigInteger('idVisitante')->nullable();

            $table->foreign('idVisitante')->references('id')->on('visitantes')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('idResidente')->references('id')->on('residentes')->onUpdate('cascade')
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
        Schema::dropIfExists('motorizados');
    }
}
