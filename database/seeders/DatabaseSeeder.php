<?php

namespace Database\Seeders;

use App\Models\personal;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(ModuloPersonalSeeder::class);
        $this->call(ModuloInventarioSeeder::class);
        $this->call(ModuloSeguridadSeeder::class);
        $this->call(ModuloAreaComunSeeder::class);
        personal::create([
            'nombre' => "Nahuel Zalazar Villca",
            'carnet' => "12499553",
            'telefono' => "69341427",
            'direccion' => "Av. Beni calle 8 nro 14",
            'fechaNac' => "2001/01/20",
            'nacionalidad' => "Argentino",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "Nahuel@gmail.com",
            'cargo' => "Administrador",
            'estado' => "Activo",
        ]);
        personal::create([
            'nombre' => "Diego Hurtado Vargas",
            'carnet' => "7777326",
            'telefono' => "71310964",
            'direccion' => "B/23 de Octubre C/Paraguay #12",
            'fechaNac' => "2000/12/24",
            'nacionalidad' => "Boliviano",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "Diego@gmail.com",
            'cargo' => "Administrador",
            'estado' => "Activo",
        ]);
        User::create([
            'name' => "Nahuel Zalazar Villca",
            'email' => "Nahuel@gmail.com",
            'password' => bcrypt('12345678'),
            'codigoPersonal' => 113
        ])->assignRole('Administrador');
        User::create([
            'name' => "Diego Hurtado",
            'email' => "Diego@gmail.com",
            'password' => bcrypt('12345678')
        ])->assignRole('Administrador');
        User::create([
            'name' => "Paul Cruz",
            'email' => "Paul@gmail.com",
            'password' => bcrypt('12345678')
        ])->assignRole('Administrador');
        User::create([
            'name' => "Daniela Carrasco",
            'email' => "Daniela@gmail.com",
            'password' => bcrypt('12345678')
        ])->assignRole('Administrador');
        User::create([
            'name' => "David Suarez",
            'email' => "David@gmail.com",
            'password' => bcrypt('12345678')
        ])->assignRole('Administrador');

        //Usuarios de prueba
        User::create([
            'name' => "Gerente",
            'email' => "gerente@gmail.com",
            'password' => bcrypt('12345678')
        ])->assignRole('Gerente');
        User::create([
            'name' => "Portero",
            'email' => "portero@gmail.com",
            'password' => bcrypt('12345678')
        ])->assignRole('Portero');
        User::create([
            'name' => "Guardia",
            'email' => "guardia@gmail.com",
            'password' => bcrypt('12345678')
        ])->assignRole('Guardia');
    }
}
