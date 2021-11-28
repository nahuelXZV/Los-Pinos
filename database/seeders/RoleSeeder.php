<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles
        $admi = Role::create(['name' => 'Administrador']);
        $gerente = Role::create(['name' => 'Gerente']);
        $guardia = Role::create(['name' => 'Guardia']);
        $portero = Role::create(['name' => 'Portero']);

        //Permisos

        //Areas Comunes
        Permission::create([
            'name' => 'admin.home',
            'descripcion' => 'Gestionar Áreas comunes'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
    }
}
