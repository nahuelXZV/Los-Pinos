<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePertenecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perteneces', function (Blueprint $table) {
            $table->unsignedBigInteger('idVivienda');
            $table->unsignedBigInteger('idResidente');
            $table->primary(['idVivienda', 'idResidente']);

            $table->foreign('idVivienda')->references('id')->on('viviendas')->onUpdate('cascade')
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
        Schema::dropIfExists('perteneces');
    }
}
