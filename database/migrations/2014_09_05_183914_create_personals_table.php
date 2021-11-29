<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('nombre');
            $table->string('carnet');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->date('fechaNac');
            $table->string('nacionalidad');
            $table->char('sexo');
            $table->string('estadoCivil')->nullable();
            $table->string('email')->unique();
            $table->string('cargo');   
            $table->string('estado');         
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
        Schema::dropIfExists('personals');
    }
}
