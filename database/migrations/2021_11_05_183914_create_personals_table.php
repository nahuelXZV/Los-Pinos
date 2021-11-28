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
            $table->string('nombre', 50);
            $table->string('carnet', 10);
            $table->string('telefono', 10)->nullable();
            $table->string('direccion', 70)->nullable();
            $table->date('fechaNac');
            $table->string('nacionalidad', 20);
            $table->char('sexo', 1);
            $table->string('estadoCivil', 15)->nullable();
            $table->string('email', 50)->unique();
            $table->string('cargo', 20);   
            $table->string('estado', 20);         
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
