<?php

namespace Database\Seeders;

use App\Models\personal;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('DROP PROCEDURE IF EXISTS newBitacora');
        // DB::statement('
        //  CREATE PROCEDURE newBitacora(IN fecha date,IN hora time,IN accion varchar(255),IN idUser integer)
        // BEGIN
        // insert into bitacoras(fecha,hora,accion,idUsuario) values (fecha, hora, accion, idUser);
        // END ');
        $this->call(RoleSeeder::class);
        $this->call(ModuloPersonalSeeder::class);
        $this->call(ModuloInventarioSeeder::class);
        $this->call(ModuloSeguridadSeeder::class);
        $this->call(ModuloAreaComunSeeder::class);
        $this->call(UserSeeder::class);
    }
}
