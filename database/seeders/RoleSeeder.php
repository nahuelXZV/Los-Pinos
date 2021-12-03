<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        //roles y cargos
        $admi = Role::create(['name' => 'Administrador']);
        $gerente = Role::create(['name' => 'Gerente']);
        $guardia = Role::create(['name' => 'Guardia']);
        $portero = Role::create(['name' => 'Portero']);
        $jardinero = Role::create(['name' => 'Jardinero']);
        $limpieza = Role::create(['name' => 'Limpieza']);
        $ninguno = Role::create(['name' => 'Ninguno']);


        //Inventario
        Permission::create([
            'name' => 'equipos',
            'descripcion' => 'Ver equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'equipos.add',
            'descripcion' => 'Añadir equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'equipos.edit',
            'descripcion' => 'Editar equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'equipos.delete',
            'descripcion' => 'Eliminar equipos'
        ])->syncRoles([$admi, $gerente]);


        Permission::create([
            'name' => 'almacenes',
            'descripcion' => 'Ver almacenes'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'almacenes.add',
            'descripcion' => 'Añadir almacenes'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'almacenes.edit',
            'descripcion' => 'Editar almacenes'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'almacenes.delete',
            'descripcion' => 'Eliminar almacenes'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'salidaEquipos',
            'descripcion' => 'Ver salidas de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'salidaEquipos.add',
            'descripcion' => 'Añadir salidas de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'salidaEquipos.edit',
            'descripcion' => 'Editar salidas de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'salidaEquipos.delete',
            'descripcion' => 'Eliminar salidas de equipos'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'salidaEquipos.show',
            'descripcion' => 'Ver detalles de salidas de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'salidaEquipos.show.add',
            'descripcion' => 'Añadir equipos a salidas de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'salidaEquipos.show.edit',
            'descripcion' => 'Editar equipos de salida de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'salidaEquipos.show.delete',
            'descripcion' => 'Eliminar equipos de salida de equipos'
        ])->syncRoles([$admi, $gerente]);


        Permission::create([
            'name' => 'regresoEquipos',
            'descripcion' => 'Ver regresos de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'regresoEquipos.add',
            'descripcion' => 'Añadir regresos de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'regresoEquipos.edit',
            'descripcion' => 'Editar regresos de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'regresoEquipos.delete',
            'descripcion' => 'Eliminar regresos de equipos'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'regresoEquipos.show',
            'descripcion' => 'Ver detalles de regreso de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'regresoEquipos.show.add',
            'descripcion' => 'Añadir equipos a regreso de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'regresoEquipos.show.edit',
            'descripcion' => 'Editar equipos de regreso de equipos'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'regresoEquipos.show.delete',
            'descripcion' => 'Eliminar equipos de regreso de equipos'
        ])->syncRoles([$admi, $gerente]);

        //Personal
        Permission::create([
            'name' => 'personal',
            'descripcion' => 'Ver personal'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'personal.add',
            'descripcion' => 'Añadir personal'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'personal.edit',
            'descripcion' => 'Editar personal'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'personal.delete',
            'descripcion' => 'Eliminar personal'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'trabajos',
            'descripcion' => 'Ver trabajos'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'trabajos.add',
            'descripcion' => 'Añadir trabajos'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'trabajos.edit',
            'descripcion' => 'Editar trabajos'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'trabajos.delete',
            'descripcion' => 'Eliminar trabajos'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'seccion',
            'descripcion' => 'Ver sección'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'seccion.add',
            'descripcion' => 'Añadir sección'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'seccion.edit',
            'descripcion' => 'Editar sección'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'seccion.delete',
            'descripcion' => 'Eliminar sección'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'reporteAsistencia',
            'descripcion' => 'Ver reportes asistencia'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteAsistencia.add',
            'descripcion' => 'Añadir reportes asistencia'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteAsistencia.edit',
            'descripcion' => 'Editar reportes asistencia'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteAsistencia.delete',
            'descripcion' => 'Eliminar reportes asistencia'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'reporteAsistencia.show',
            'descripcion' => 'Ver detalles de reportes asistencia'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteAsistencia.show.add',
            'descripcion' => 'Añadir detalles de reportes asistencia'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteAsistencia.show.edit',
            'descripcion' => 'Editar detalles de reportes asistencia'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteAsistencia.show.delete',
            'descripcion' => 'Eliminar detalles de reportes asistencia'
        ])->syncRoles([$admi, $gerente]);


        Permission::create([
            'name' => 'reporteTrabajo',
            'descripcion' => 'Ver reportes trabajo'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteTrabajo.add',
            'descripcion' => 'Añadir reportes trabajo'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteTrabajo.edit',
            'descripcion' => 'Editar reportes trabajo'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteTrabajo.delete',
            'descripcion' => 'Eliminar reportes trabajo'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'reporteTrabajo.show',
            'descripcion' => 'Ver detalles de reportes trabajo'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteTrabajo.show.add',
            'descripcion' => 'Añadir detalles de reportes trabajo'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteTrabajo.show.edit',
            'descripcion' => 'Editar detalles de reportes trabajo'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'reporteTrabajo.show.delete',
            'descripcion' => 'Eliminar detalles de reportes trabajo'
        ])->syncRoles([$admi, $gerente]);

        //SISTEMA------------------------------------------------------------------
        Permission::create([
            'name' => 'usuarios',
            'descripcion' => 'Ver Usuarios'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'usuarios.add',
            'descripcion' => 'Añadir Usuarios'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'usuarios.edit',
            'descripcion' => 'Editar Usuarios'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'usuarios.delete',
            'descripcion' => 'Eliminar Usuarios'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'roles',
            'descripcion' => 'Ver Roles'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'roles.add',
            'descripcion' => 'Añadir Roles'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'roles.edit',
            'descripcion' => 'Editar Roles'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'roles.delete',
            'descripcion' => 'Eliminar Roles'
        ])->syncRoles([$admi, $gerente]);


        Permission::create([
            'name' => 'bitacora',
            'descripcion' => 'Ver bitacora'
        ])->syncRoles([$admi, $gerente]);

        Permission::create([
            'name' => 'inicio',
            'descripcion' => 'Acceso al inicio'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);


        //Areas Comunes -------------------------------------------------------------
        Permission::create([
            'name' => 'reserva',
            'descripcion' => 'Gestionar Reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.add',
            'descripcion' => 'Añadir Reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.edit',
            'descripcion' => 'Editar Reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.delete',
            'descripcion' => 'Eliminar Reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.all',
            'descripcion' => 'Gestionar Calendario de reserva'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.list',
            'descripcion' => 'Ver lista de reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.show',
            'descripcion' => 'Gestionar detalles de reservas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'reserva.reporte',
            'descripcion' => 'Ver reportes'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.reporte.add',
            'descripcion' => 'Añadir reportes'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.reporte.edit',
            'descripcion' => 'Editar reportes'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.reporte.delete',
            'descripcion' => 'Eliminar reportes'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);

        Permission::create([
            'name' => 'reserva.invitado',
            'descripcion' => 'Ver invitados'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.invitado.add',
            'descripcion' => 'Añadir invitados'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.invitado.edit',
            'descripcion' => 'Editar invitados'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'reserva.invitado.delete',
            'descripcion' => 'Eliminar invitados'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);


        Permission::create([
            'name' => 'areacomun',
            'descripcion' => 'Ver áreas comunes'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'areacomun.add',
            'descripcion' => 'Añadir áreas comunes'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'areacomun.edit',
            'descripcion' => 'Editar áreas comunes'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'areacomun.delete',
            'descripcion' => 'Eliminar áreas comunes'
        ])->syncRoles([$admi, $gerente]);



        //Modulo seguridad------------------------------------------------
        Permission::create([
            'name' => 'residentes',
            'descripcion' => 'Ver residentes'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'residentes.add',
            'descripcion' => 'Añadir residentes'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'residentes.edit',
            'descripcion' => 'Editar residentes'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'residentes.delete',
            'descripcion' => 'Eliminar residentes'
        ])->syncRoles([$admi, $gerente]);


        Permission::create([
            'name' => 'visitantes',
            'descripcion' => 'Ver visitantes'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'visitantes.add',
            'descripcion' => 'Añadir visitantes'
        ])->syncRoles([$admi, $gerente, $portero]);
        Permission::create([
            'name' => 'visitantes.edit',
            'descripcion' => 'Editar visitantes'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'visitantes.delete',
            'descripcion' => 'Eliminar visitantes'
        ])->syncRoles([$admi, $gerente]);


        Permission::create([
            'name' => 'motorizados',
            'descripcion' => 'Ver motorizados'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'motorizados.add',
            'descripcion' => 'Añadir motorizados'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'motorizados.edit',
            'descripcion' => 'Editar motorizados'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'motorizados.delete',
            'descripcion' => 'Eliminar motorizados'
        ])->syncRoles([$admi, $gerente]);


        Permission::create([
            'name' => 'viviendas',
            'descripcion' => 'Ver viviendas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'viviendas.add',
            'descripcion' => 'Añadir viviendas'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'viviendas.edit',
            'descripcion' => 'Editar viviendas'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'viviendas.delete',
            'descripcion' => 'Eliminar viviendas'
        ])->syncRoles([$admi, $gerente]);


        Permission::create([
            'name' => 'ingresos',
            'descripcion' => 'Ver ingresos a la urbanización'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'ingresos.add',
            'descripcion' => 'Añadir ingresos a la urbanización'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'ingresos.edit',
            'descripcion' => 'Editar ingresos a la urbanización'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'ingresos.delete',
            'descripcion' => 'Eliminar de ingresos de la urbanización'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'ingresos.show',
            'descripcion' => 'Gestionar detalles de ingresos'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);


        Permission::create([
            'name' => 'salidas',
            'descripcion' => 'Ver salidas de la urbanización'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'salidas.add',
            'descripcion' => 'Añadir salidas a la urbanización'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'salidas.edit',
            'descripcion' => 'Editar salidas a la urbanización'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
        Permission::create([
            'name' => 'salidas.delete',
            'descripcion' => 'Eliminar de salidas de la urbanización'
        ])->syncRoles([$admi, $gerente]);
        Permission::create([
            'name' => 'salidas.show',
            'descripcion' => 'Gestionar detalles de salidas'
        ])->syncRoles([$admi, $gerente, $portero, $guardia]);
    }
}
