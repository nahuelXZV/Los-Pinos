<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\personal;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            'nombre' => "Daniela Carrasco",
            'carnet' => "58654124",
            'telefono' => "63526985",
            'direccion' => "Av. paragua calle 8",
            'fechaNac' => "2000/05/21",
            'nacionalidad' => "Boliviana",
            'sexo' => "F",
            'estadoCivil' => "Soltera",
            'email' => "Daniela@gmail.com",
            'cargo' => "Administrador",
            'estado' => "Activo",
        ]);
        personal::create([
            'nombre' => "David Suares Sandoval",
            'carnet' => "586957412",
            'telefono' => "78545652",
            'direccion' => "Av. Brazil #52",
            'fechaNac' => "2001/05/10",
            'nacionalidad' => "Boliviano",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "David@gmail.com",
            'cargo' => "Administrador",
            'estado' => "Activo",
        ]);
        personal::create([
            'nombre' => "Paul Cruz Vargas",
            'carnet' => "586841244",
            'telefono' => "75452536",
            'direccion' => "Av. Peru #100",
            'fechaNac' => "2001/10/15",
            'nacionalidad' => "Boliviano",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "Paul@gmail.com",
            'cargo' => "Administrador",
            'estado' => "Activo",
        ]);
        personal::create([
            'nombre' => "Diego Hurtado Vargas",
            'carnet' => "25365478",
            'telefono' => "785452159",
            'direccion' => "Av. Baras #1500",
            'fechaNac' => "2001/12/25",
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
            'codigoPersonal' => 14
        ])->assignRole('Administrador');
        User::create([
            'name' => "Diego Hurtado",
            'email' => "Diego@gmail.com",
            'password' => bcrypt('12345678'),
            'codigoPersonal' => 18
        ])->assignRole('Administrador');
        User::create([
            'name' => "Paul Cruz",
            'email' => "Paul@gmail.com",
            'password' => bcrypt('12345678'),
            'codigoPersonal' => 17
        ])->assignRole('Administrador');
        User::create([
            'name' => "Daniela Carrasco",
            'email' => "Daniela@gmail.com",
            'password' => bcrypt('12345678'),
            'codigoPersonal' => 15
        ])->assignRole('Administrador');
        User::create([
            'name' => "David Suarez",
            'email' => "David@gmail.com",
            'password' => bcrypt('12345678'),
            'codigoPersonal' => 16
        ])->assignRole('Administrador');


        //Usuarios de prueba
        User::create([
            'name' => "Elena Garcia Taborga",
            'email' => "gerente@gmail.com",
            'password' => bcrypt('12345678'),
            'codigoPersonal' => 12
        ])->assignRole('Gerente');
        User::create([
            'name' => "Hugo Cruz Rojas",
            'email' => "portero@gmail.com",
            'password' => bcrypt('12345678'),
            'codigoPersonal' => 7
        ])->assignRole('Portero');
        User::create([
            'name' => "Renato Fernandez Ribera",
            'email' => "guardia@gmail.com",
            'password' => bcrypt('12345678'),
            'codigoPersonal' => 4
        ])->assignRole('Guardia');
    }
}
