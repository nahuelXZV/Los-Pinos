<?php

namespace Database\Seeders;

use App\Models\bitacora;
use App\Models\horario;
use App\Models\horarioPersonal;
use App\Models\ingresoPersonal;
use App\Models\permiso;
use App\Models\personal;
use App\Models\realizo;
use App\Models\reporteA;
use App\Models\reporteT;
use App\Models\salidaPersonal;
use App\Models\seccion;
use App\Models\trabajo;
use app\models\User;
use Illuminate\Database\Seeder;

class ModuloPersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //---------- TABA PERSONAL ----------//
        personal::create([
            'codigo' => 100,
            'nombre' => "Jose Fernando Alvarez Guzman",
            'carnet' => "12457963",
            'telefono' => "69024157",
            'direccion' => "Av. Beni calle 8 nro 14",
            'fechaNac' => "1987/08/15",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "josealvarez@gmail.com",
            'cargo' => "Guardia",
            'estado' => "Activo",
        ]);
        personal::create([
            'codigo' => 101,
            'nombre' => "Sergio Andres Copi Añez",
            'carnet' => "45783698",
            'telefono' => "77645120",
            'direccion' => "Av. Banzer calle 1 nro 48",
            'fechaNac' => "1999/02/01",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Casado",
            'email' => "sergiocopi@gmail.com",
            'cargo' => "Portero Entrada",
            'estado' => "Activo",
        ]);
        personal::create([
            'codigo' => 102,
            'nombre' => "Paola Salazar Quiroga",
            'carnet' => "14980266",
            'telefono' => "69045671",
            'direccion' => "Av. Busch calle 5 nro 105",
            'fechaNac' => "1995/05/22",
            'nacionalidad' => "Boliviana",
            'sexo' => "F",
            'estadoCivil' => "Soltero",
            'email' => "paolasalazar@gmail.com",
            'cargo' => "Limpieza",
            'estado' => "Activo",
        ]);
        personal::create([
            'codigo' => 103,
            'nombre' => "Renato Fernandez Ribera",
            'carnet' => "14780255",
            'telefono' => "77984570",
            'direccion' => "Av. Centenario calle A nro 15",
            'fechaNac' => "1981/06/14",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "renatof@gmail.com",
            'cargo' => "Guardia",
            'estado' => "Inactivo",
        ]);
        personal::create([
            'codigo' => 104,
            'nombre' => "Sonia Añez Copi",
            'carnet' => "36125487",
            'telefono' => "69065841",
            'direccion' => "Av. Roca y Coronado calle 10 nro 11",
            'fechaNac' => "2000/01/30",
            'nacionalidad' => "Boliviana",
            'sexo' => "F",
            'estadoCivil' => "Soltero",
            'email' => "soniaanez@gmail.com",
            'cargo' => "Limpieza",
            'estado' => "Inactivo",
        ]);
        personal::create([
            'codigo' => 105,
            'nombre' => "Fernando Suarez Suarez",
            'carnet' => "78123598",
            'telefono' => "65084321",
            'direccion' => "Av. Pirai calle 4 nro 89",
            'fechaNac' => "1997/11/23",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Casado",
            'email' => "fersuarez@gmail.com",
            'cargo' => "Portero Almacen",
            'estado' => "Activo",
        ]);
        personal::create([
            'codigo' => 106,
            'nombre' => "Hugo Cruz Rojas",
            'carnet' => "12457698",
            'telefono' => "62841534",
            'direccion' => "Av. Beni calle 7 nro 111",
            'fechaNac' => "1987/08/26",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "hugocruz@gmail.com",
            'cargo' => "Portero Entrada",
            'estado' => "Activo",
        ]);
        personal::create([
            'codigo' => 107,
            'nombre' => "Humberto Carrasco Gutierrez",
            'carnet' => "45983687",
            'telefono' => "77981548",
            'direccion' => "Av. Mutualista calle D nro 150",
            'fechaNac' => "1979/12/25",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "humbertoc@gmail.com",
            'cargo' => "Jardinero",
            'estado' => "Activo",
        ]);
        personal::create([
            'codigo' => 108,
            'nombre' => "Carlos Gomez Zambrana",
            'carnet' => "32015478",
            'telefono' => "69842715",
            'direccion' => "Av.  Hernando Sanabria calle 4 nro 13",
            'fechaNac' => "1977/07/16",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "carlosgomez@gmail.com",
            'cargo' => "Jardinero",
            'estado' => "Activo",
        ]);
        personal::create([
            'codigo' => 109,
            'nombre' => "David Hurtado Escobar",
            'carnet' => "12487596",
            'telefono' => "69065198",
            'direccion' => "Av. Landivar calle 6 nro 47",
            'fechaNac' => "1994/04/27",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Casado",
            'email' => "davidh@gmail.com",
            'cargo' => "Limpieza",
            'estado' => "Inactivo",
        ]);
        personal::create([
            'codigo' => 110,
            'nombre' => "Gabriel Blanco Alegria",
            'carnet' => "45120836",
            'telefono' => "77321548",
            'direccion' => "Av. El Trompillo calle 10 nro 85",
            'fechaNac' => "1993/09/14",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "gabrielblanco@gmail.com",
            'cargo' => "Jardinero",
            'estado' => "Inactivo",
        ]);
        personal::create([
            'codigo' => 111,
            'nombre' => "Elena Garcia Taborga",
            'carnet' => "48798165",
            'telefono' => "69058437",
            'direccion' => "Av. Centenario calle 8 nro 105",
            'fechaNac' => "1994/01/15",
            'nacionalidad' => "Boliviana",
            'sexo' => "F",
            'estadoCivil' => "Soltero",
            'email' => "elenagarcia@gmail.com",
            'cargo' => "Gerente",
            'estado' => "Inactivo",
        ]);
        personal::create([
            'codigo' => 112,
            'nombre' => "Jose Flores Justiniano",
            'carnet' => "12478656",
            'telefono' => "77656632",
            'direccion' => "Av. Roca y Coronado calle B nro 10",
            'fechaNac' => "2000/02/14",
            'nacionalidad' => "Boliviana",
            'sexo' => "M",
            'estadoCivil' => "Soltero",
            'email' => "joseflores@gmail.com",
            'cargo' => "Guardia",
            'estado' => "Activo",
        ]);

        //---------- TABLA USER ----------//
        User::create([
            'name' => "Sonia Añez Copi",
            'email' => "soniaanez@gmail.com",
            'password' => bcrypt('aagdfhadfh68a64854a'),
            'codigoPersonal' => 104,
        ]);
        User::create([
            'name' => "Sergio Andres Copi Añez",
            'email' => "sergiocopi@gmail.com",
            'password' => bcrypt('a6fdg464gs6g54dv8a98'),
            'codigoPersonal' => 101,
        ]);
        User::create([
            'name' => "Hugo Cruz Rojas",
            'email' => "hugocruz@gmail.com",
            'password' => bcrypt('s65shn65f4h65nmd56as'),
            'codigoPersonal' => 105,
        ]);
        User::create([
            'name' => "Fernando Suarez Suarez",
            'email' => "fersuarez@gmail.com",
            'password' => bcrypt('s56d4fb687a897d89jj'),
            'codigoPersonal' => 106,
        ]);
        User::create([
            'name' => "Elena Garcia Taborga",
            'email' => "elenagarcia@gmail.com",
            'password' => bcrypt('4a65vb4a65nbaj4hh4'),
            'codigoPersonal' => 111,
        ]);

        //---------- TABLA BITÁCORA ----------//
        bitacora::create([
            'fecha' => "2021/08/10",
            'hora' => "11:00",
            'accion' => "Añadir personal",
            'idUsuario' => 5,
        ]);
        bitacora::create([
            'fecha' => "2012/08/11",
            'hora' => "10:00",
            'accion' => "Añadir personal",
            'idUsuario' => 5,
        ]);

        //---------- TABLA HORARIO ----------//
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "5:00",
            'horaFinal' => "12:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "14:00",
            'horaFinal' => "20:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "20:00",
            'horaFinal' => "5:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "7:00",
            'horaFinal' => "14:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "14:00",
            'horaFinal' => "22:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "5:00",
            'horaFinal' => "12:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "5:00",
            'horaFinal' => "12:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "14:00",
            'horaFinal' => "20:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "20:00",
            'horaFinal' => "5:00",
        ]);
        horario::create([
            'dia' => "Martes",
            'horaInicio' => "8:00",
            'horaFinal' => "14:00",
        ]);
        horario::create([
            'dia' => "Viernes",
            'horaInicio' => "14:00",
            'horaFinal' => "20:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "8:00",
            'horaFinal' => "14:00",
        ]);
        horario::create([
            'dia' => "Jueves",
            'horaInicio' => "14:00",
            'horaFinal' => "20:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "7:00",
            'horaFinal' => "12:00",
        ]);
        horario::create([
            'dia' => "Lunes",
            'horaInicio' => "14:00",
            'horaFinal' => "20:00",
        ]);

        //---------- TABLA SECCION ----------//
        seccion::create([
            'calle' => "Centenares",
            'manzano' => 1,
        ]);
        seccion::create([
            'calle' => "España",
            'manzano' => 5,
        ]);
        seccion::create([
            'calle' => "Santa Cruz",
            'manzano' => 2,
        ]);
        seccion::create([
            'calle' => "Portugal",
            'manzano' => 3,
        ]);
        seccion::create([
            'calle' => "Argentina",
            'manzano' => 4,
        ]);

        //---------- TABLA TRABAJO ----------//
        trabajo::create([
            'actividad' => "Limpieza",
            'idSeccion' => 1,
        ]);
        trabajo::create([
            'actividad' => "Vigilancia",
            'idSeccion' => 2,
        ]);
        trabajo::create([
            'actividad' => "Jardineria",
            'idSeccion' => 3,
        ]);
        trabajo::create([
            'actividad' => "Mantenimiento de area comun",
            'idSeccion' => 5,
        ]);
        trabajo::create([
            'actividad' => "Encargado de almacen",
            'idSeccion' => 4,
        ]);
        trabajo::create([
            'actividad' => "Controlar Ingreso",
            'idSeccion' => 3,
        ]);

        //---------- REPORTE T ----------//
        reporteT::create([
            'fecha' => "2021/08/01",
            'codPersonal' => 104,
        ]);
        reporteT::create([
            'fecha' => "2021/02/15",
            'codPersonal' => 105,
        ]);
        reporteT::create([
            'fecha' => "2021/03/21",
            'codPersonal' => 104,
        ]);
        reporteT::create([
            'fecha' => "2021/07/14",
            'codPersonal' => 103,
        ]);
        reporteT::create([
            'fecha' => "2021/09/11",
            'codPersonal' => 103,
        ]);
        reporteT::create([
            'fecha' => "2021/08/08",
            'codPersonal' => 104,
        ]);
        reporteT::create([
            'fecha' => "2021/09/22",
            'codPersonal' => 102,
        ]);
        reporteT::create([
            'fecha' => "2021/06/13",
            'codPersonal' => 102,
        ]);
        reporteT::create([
            'fecha' => "2021/07/15",
            'codPersonal' => 104,
        ]);
        reporteT::create([
            'fecha' => "2021/10/14",
            'codPersonal' => 102,
        ]);

        //---------- TABLA DE REPORTE A ----------//
        reporteA::create([
            'fecha' => "2021/06/12",
            'codigoPersonal' => 107,
        ]);
        reporteA::create([
            'fecha' => "2021/01/05",
            'codigoPersonal' => 104,
        ]);
        reporteA::create([
            'fecha' => "2021/03/15",
            'codigoPersonal' => 107,
        ]);
        reporteA::create([
            'fecha' => "2021/02/09",
            'codigoPersonal' => 106,
        ]);
        reporteA::create([
            'fecha' => "2021/08/19",
            'codigoPersonal' => 104,
        ]);
        reporteA::create([
            'fecha' => "2021/09/29",
            'codigoPersonal' => 104,
        ]);
        reporteA::create([
            'fecha' => "2021/02/28",
            'codigoPersonal' => 100,
        ]);
        reporteA::create([
            'fecha' => "2021/10/02",
            'codigoPersonal' => 105,
        ]);
        reporteA::create([
            'fecha' => "2021/04/22",
            'codigoPersonal' => 104,
        ]);
        reporteA::create([
            'fecha' => "2021/05/26",
            'codigoPersonal' => 102,
        ]);
        reporteA::create([
            'fecha' => "2021/05/28",
            'codigoPersonal' => 107,
        ]);
        reporteA::create([
            'fecha' => "2021/09/05",
            'codigoPersonal' => 100,
        ]);
        reporteA::create([
            'fecha' => "2021/01/20",
            'codigoPersonal' => 100,
        ]);
        reporteA::create([
            'fecha' => "2021/07/02",
            'codigoPersonal' => 107,
        ]);
        reporteA::create([
            'fecha' => "2021/09/06",
            'codigoPersonal' => 101,
        ]);

        //---------- TABLA PERMISO ----------//
        permiso::create([
            'motivo' => "Enfermedad",
            'idReporteA' => 1,
        ]);
        permiso::create([
            'motivo' => "Viaje",
            'idReporteA' => 5,
        ]);
        permiso::create([
            'motivo' => "Transporte",
            'idReporteA' => 2,
        ]);
        permiso::create([
            'motivo' => "Enfermedad",
            'idReporteA' => 4,
        ]);
        permiso::create([
            'motivo' => "Accidente",
            'idReporteA' => 9,
        ]);
        permiso::create([
            'motivo' => "Enfermedad",
            'idReporteA' => 10,
        ]);

        //---------- TABLA DE INGRESO DEL PERSONAL ----------//
        ingresoPersonal::create([
            'hora' => "7:00",
            'retraso' => 5,
            'idReporteA' => 3,
        ]);
        ingresoPersonal::create([
            'hora' => "10:00",
            'retraso' => 0,
            'idReporteA' => 6,
        ]);
        ingresoPersonal::create([
            'hora' => "7:30",
            'retraso' => 1,
            'idReporteA' => 7,
        ]);
        ingresoPersonal::create([
            'hora' => "12:00",
            'retraso' => 2,
            'idReporteA' => 8,
        ]);
        ingresoPersonal::create([
            'hora' => "14:00",
            'retraso' => 10,
            'idReporteA' => 10,
        ]);
        ingresoPersonal::create([
            'hora' => "7:00",
            'retraso' => 15,
            'idReporteA' => 5,
        ]);
        ingresoPersonal::create([
            'hora' => "4:00",
            'retraso' => 7,
            'idReporteA' => 7,
        ]);
        ingresoPersonal::create([
            'hora' => "6:00",
            'retraso' => 8,
            'idReporteA' => 2,
        ]);
        ingresoPersonal::create([
            'hora' => "15:30",
            'retraso' => 6,
            'idReporteA' => 4,
        ]);
        ingresoPersonal::create([
            'hora' => "7:00",
            'retraso' => 7,
            'idReporteA' => 10,
        ]);
        ingresoPersonal::create([
            'hora' => "7:30",
            'retraso' => 5,
            'idReporteA' => 14,
        ]);
        ingresoPersonal::create([
            'hora' => "10:00",
            'retraso' => 6,
            'idReporteA' => 15,
        ]);
        ingresoPersonal::create([
            'hora' => "14:00",
            'retraso' => 0,
            'idReporteA' => 5,
        ]);
        ingresoPersonal::create([
            'hora' => "13:00",
            'retraso' => 1,
            'idReporteA' => 3,
        ]);
        ingresoPersonal::create([
            'hora' => "7:00",
            'retraso' => 1,
            'idReporteA' => 15,
        ]);

        //---------- TABLA DE SALIDA DEL PERSONAL ----------//
        salidaPersonal::create([
            'hora' => "15:00",
            'idReporteA' => 8,
        ]);
        salidaPersonal::create([
            'hora' => "18:00",
            'idReporteA' => 5,
        ]);
        salidaPersonal::create([
            'hora' => "15:30",
            'idReporteA' => 3,
        ]);
        salidaPersonal::create([
            'hora' => "20:00",
            'idReporteA' => 10,
        ]);
        salidaPersonal::create([
            'hora' => "22:00",
            'idReporteA' => 2,
        ]);
        salidaPersonal::create([
            'hora' => "15:00",
            'idReporteA' => 10,
        ]);
        salidaPersonal::create([
            'hora' => "12:00",
            'idReporteA' => 7,
        ]);
        salidaPersonal::create([
            'hora' => "13:00",
            'idReporteA' => 3,
        ]);
        salidaPersonal::create([
            'hora' => "21:30",
            'idReporteA' => 6,
        ]);
        salidaPersonal::create([
            'hora' => "15:00",
            'idReporteA' => 9,
        ]);
        salidaPersonal::create([
            'hora' => "15:30",
            'idReporteA' => 3,
        ]);
        salidaPersonal::create([
            'hora' => "18:00",
            'idReporteA' => 8,
        ]);
        salidaPersonal::create([
            'hora' => "22:00",
            'idReporteA' => 14,
        ]);
        salidaPersonal::create([
            'hora' => "20:00",
            'idReporteA' => 10,
        ]);
        salidaPersonal::create([
            'hora' => "11:30",
            'idReporteA' => 15,
        ]);

        //---------- TABLA DE HORARIO PERSONAL ----------//
        horarioPersonal::create([
            'idHorario' => 1,
            'codigoPersonal' => 100,
        ]);
        horarioPersonal::create([
            'idHorario' => 11,
            'codigoPersonal' => 104,
        ]);
        horarioPersonal::create([
            'idHorario' => 10,
            'codigoPersonal' => 100,
        ]);
        horarioPersonal::create([
            'idHorario' => 4,
            'codigoPersonal' => 104,
        ]);
        horarioPersonal::create([
            'idHorario' => 10,
            'codigoPersonal' => 104,
        ]);
        horarioPersonal::create([
            'idHorario' => 13,
            'codigoPersonal' => 100,
        ]);

        //---------- TABLA REALIZO ----------//
        realizo::create([
            'hora' => "14:00",
            'idTrabajo' => 1,
            'idReporteT' => 2,
        ]);
        realizo::create([
            'hora' => "15:00",
            'idTrabajo' => 1,
            'idReporteT' => 2,
        ]);
        realizo::create([
            'hora' => "10:00",
            'idTrabajo' => 2,
            'idReporteT' => 1,
        ]);
        realizo::create([
            'hora' => "11:00",
            'idTrabajo' => 2,
            'idReporteT' => 3,
        ]);
        realizo::create([
            'hora' => "17:00",
            'idTrabajo' => 2,
            'idReporteT' => 1,
        ]);
        realizo::create([
            'hora' => "7:00",
            'idTrabajo' => 5,
            'idReporteT' => 5,
        ]);
        realizo::create([
            'hora' => "8:00",
            'idTrabajo' => 5,
            'idReporteT' => 5,
        ]);
        realizo::create([
            'hora' => "10:00",
            'idTrabajo' => 5,
            'idReporteT' => 5,
        ]);
        realizo::create([
            'hora' => "7:00",
            'idTrabajo' => 6,
            'idReporteT' => 6,
        ]);
        realizo::create([
            'hora' => "13:00",
            'idTrabajo' => 6,
            'idReporteT' => 6,
        ]);
        realizo::create([
            'hora' => "14:00",
            'idTrabajo' => 3,
            'idReporteT' => 7,
        ]);
        realizo::create([
            'hora' => "16:00",
            'idTrabajo' => 3,
            'idReporteT' => 7,
        ]);
        realizo::create([
            'hora' => "14:00",
            'idTrabajo' => 5,
            'idReporteT' => 1,
        ]);
        realizo::create([
            'hora' => "14:00",
            'idTrabajo' => 5,
            'idReporteT' => 1,
        ]);
    
    }
}