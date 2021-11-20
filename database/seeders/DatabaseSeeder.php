<?php

namespace Database\Seeders;

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
        User::create([
            'name' => "Nahuel Zalazar",
            'email' => "Nahuel@gmail.com",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => "Diego Hurtado",
            'email' => "Diego@gmail.com",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => "Paul Cruz",
            'email' => "Paul@gmail.com",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => "Daniela Carrasco",
            'email' => "Daniela@gmail.com",
            'password' => bcrypt('12345678')
        ]);
        User::create([
            'name' => "David Suarez",
            'email' => "David@gmail.com",
            'password' => bcrypt('12345678')
        ]);

        $this->call(ModuloPersonalSeeder::class);
        $this->call(ModuloInventarioSeeder::class);
        $this->call(ModuloSeguridadSeeder::class);
        $this->call(ModuloAreaComunSeeder::class);
    }
}
