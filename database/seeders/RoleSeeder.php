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
        $ninguno = Role::create(['name' => 'Ninguno']);

        //SISTEMA
        Permission::create([
            'name' => 'usuarios',
            'descripcion' => 'Gestionar Usuarios'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'roles',
            'descripcion' => 'Gestionar Roles'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'inicio',
            'descripcion' => 'Acceso al inicio'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        //Areas Comunes
        Permission::create([
            'name' => 'reserva',
            'descripcion' => 'Gestionar Reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'reserva.all',
            'descripcion' => 'Gestionar Calendario de reserva'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'reserva.list',
            'descripcion' => 'Gestionar lista de reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'reserva.show',
            'descripcion' => 'Gestionar detalles de reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'areacomun',
            'descripcion' => 'Gestionar áreas comunes'
        ])->syncRoles([$admi, $gerente]);


        //Modulo seguridad
        Permission::create([
            'name' => 'residentes',
            'descripcion' => 'Gestionar residentes'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'visitantes',
            'descripcion' => 'Gestionar visitantes'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'motorizados',
            'descripcion' => 'Gestionar motorizados'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'viviendas',
            'descripcion' => 'Gestionar viviendas'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'ingresos',
            'descripcion' => 'Gestionar ingresos a la urbanización'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'salidas',
            'descripcion' => 'Gestionar salidas de la urbanización'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'ingresos.show',
            'descripcion' => 'Gestionar detalles de ingresos'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'salidas.show',
            'descripcion' => 'Gestionar detalles de salidas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
    }
}
