<?php

namespace Database\Seeders;

use App\Models\almacen;
use App\Models\equipo;
use App\Models\regreso;
use App\Models\regresoEquipo;
use App\Models\saco;
use App\Models\salidaEquipo;
use Illuminate\Database\Seeder;

class ModuloInventarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //---------- TABLA DE ALMACEN ----------//
        almacen::create([
            'nombre' => "La Union",
            'calle' => "Santa Cruz",
            'manzano' => 1,
        ]);
        almacen::create([
            'nombre' => "Fortaleza",
            'calle' => "España",
            'manzano' => 2,
        ]);

        //---------- TABLA DE EQUIPOS ----------//
        equipo::create([
            'nombre' => "escoba",
            'modelo' => "2015",
            'marca' => "Limpia Todo",
            'descripcion' => "Utencilio de madera para limpiar, barrer superficies",
            'multiplicidad' => "Multiple",
            'stock' => 10,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "cono",
            'modelo' => "2020",
            'marca' => "Eco Limpieza",
            'descripcion' => "Señal de plastico para indicar trabajo en una zona especifica",
            'multiplicidad' => "Multiple",
            'stock' => 20,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
           'nombre' => "soplador",
            'modelo' => "2015",
            'marca' => "Limpia Todo",
            'descripcion' => "Maquina que sopla",
            'multiplicidad' => "Único",
            'stock' => 1,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Mantenimiento",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "aspiradora",
            'modelo' => "2020",
            'marca' => "Aseo Natural",
            'descripcion' => "Maquina que aspira",
            'multiplicidad' => "Único",
            'stock' => 1,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Dañado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "trapeador",
            'modelo' => "2020",
            'marca' => "Limpia Todo",
            'descripcion' => "Utencilio para trapear pisos",
            'multiplicidad' => "Multiple",
            'stock' => 10,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "toalla",
            'modelo' => "2015",
            'marca' => "Limpia Todo",
            'descripcion' => "Toallas para limpiar todo tipo de superficie",
            'multiplicidad' => "Multiple",
            'stock' => 20,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "cloro",
            'modelo' => "2015",
            'marca' => "Eco Limpieza",
            'descripcion' => "Quimico para mantener la claridad y pureza del agua de las piscinas",
            'multiplicidad' => "Multiple",
            'stock' => 10,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "sacatelaraña",
            'modelo' => "2015",
            'marca' => "Limpia Todo",
            'descripcion' => "Utencilio que se usa para limpiar espacios mas altos ",
            'multiplicidad' => "Multiple",
            'stock' => 10,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "esponja",
            'modelo' => "2018",
            'marca' => "Limpia Todo",
            'descripcion' => "Utencilio para la limpieza de superficies",
            'multiplicidad' => "Multiple",
            'stock' => 10,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "rastrillo",
            'modelo' => "2018",
            'marca' => "Limpia Todo",
            'descripcion' => "Herramienta para apilar hojas",
            'multiplicidad' => "Multiple",
            'stock' => 5,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "corta cesped",
            'modelo' => "2015",
            'marca' => "Aseo Natural",
            'descripcion' => "Maquina para cortar o podar cesped",
            'multiplicidad' => "Único",
            'stock' => 1,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "tijeras para pasto",
            'modelo' => "2018",
            'marca' => "Eco Limpieza",
            'descripcion' => "Herramienta para cortar pasto",
            'multiplicidad' => "Multiple",
            'stock' => 5,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "basurero",
            'modelo' => "2020",
            'marca' => "Limpia Todo",
            'descripcion' => "Contenedor de plastico para guardar residuos",
            'multiplicidad' => "Multiple",
            'stock' => 30,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "jabon liquido",
            'modelo' => "2015",
            'marca' => "Limpia Todo",
            'descripcion' => "Liquido especial para limpiar superficies",
            'multiplicidad' => "Multiple",
            'stock' => 10,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "cepillo",
            'modelo' => "2015",
            'marca' => "Limpia Todo",
            'descripcion' => "Utencilio para limpiar",
            'multiplicidad' => "Multiple",
            'stock' => 10,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "maquina desinfectante",
            'modelo' => "2015",
            'marca' => "AntiVirus",
            'descripcion' => "Maquina para desinfectar en porteria a las personas",
            'multiplicidad' => "Único",
            'stock' => 1,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Dañado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "escalera",
            'modelo' => "2018",
            'marca' => "Eco Limpieza",
            'descripcion' => "Escalera para subir a lugares elevados",
            'multiplicidad' => "Único",
            'stock' => 1,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "linterna",
            'modelo' => "2015",
            'marca' => "Tools",
            'descripcion' => "Herramienta para iluminar",
            'multiplicidad' => "Multiple",
            'stock' => 20,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "radiocomunicador",
            'modelo' => "2018",
            'marca' => "Caterpilar",
            'descripcion' => "Aparato para comunicacion a corta y media distancia",
            'multiplicidad' => "Único",
            'stock' => 1,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Dañado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'nombre' => "equipo para churrasquera",
            'modelo' => "2020",
            'marca' => "CarneMaster",
            'descripcion' => "Todo tipo de cubiertos, y herramienta necesarias para un churrasco",
            'multiplicidad' => "Único",
            'stock' => 1,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'nombre' => "señal de limpieza",
            'modelo' => "2015",
            'marca' => "Eco Limpieza",
            'descripcion' => "Señal de plastico para indicar que se limpia una zona especifica",
            'multiplicidad' => "Multiple",
            'stock' => 10,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 2,
        ]);

        //---------- TABLA DE SALIDA DE EQUIPO ----------//
        salidaEquipo::create([
            'fecha' => "2021/05/13",
            'hora' => "12:00",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 10,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/06/23",
            'hora' => "13:30",
            'motivo' => "Para Desechar",
            'codigoPersonal' => 1,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/07/19",
            'hora' => "14:45",
            'motivo' => "Para mantenimiento",
            'codigoPersonal' => 4,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/04/21",
            'hora' => "10:30",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 11,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/08/24",
            'hora' => "16:33",
            'motivo' => "Para mantenimiento",
            'codigoPersonal' => 8,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/04/20",
            'hora' => "14:20",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 4,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/07/21",
            'hora' => "17:11",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 2,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/09/25",
            'hora' => "15:35",
            'motivo' => "Para mantenimiento",
            'codigoPersonal' => 7,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/06/16",
            'hora' => "11:30",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 4,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/07/16",
            'hora' => "11:22",
            'motivo' => "Para mantenimiento",
            'codigoPersonal' => 5,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/08/21",
            'hora' => "9:22",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 5,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/08/29",
            'hora' => "9:50",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 10,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/07/14",
            'hora' => "15:00",
            'motivo' => "Para Desechar",
            'codigoPersonal' => 12,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/06/22",
            'hora' => "13:25",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 2,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/04/25",
            'hora' => "16:21",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 5,
        ]);

        //---------- TABLA DE REGRESO EQUIPO ----------//
        regresoEquipo::create([
            'fecha' => "2021/08/23",
            'hora' => "13:22",
            'codigoPersonal' => 9,
            'idSalidaEquipo' => 11,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/09/25",
            'hora' => "16:35",
            'codigoPersonal' => 7,
            'idSalidaEquipo' => 8,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/05/13",
            'hora' => "14:00",
            'codigoPersonal' => 10,
            'idSalidaEquipo' => 1,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/10/12",
            'hora' => "20:45",
            'codigoPersonal' => 9,
            'idSalidaEquipo' => 8,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/04/20",
            'hora' => "15:20",
            'codigoPersonal' => 4,
            'idSalidaEquipo' => 6,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/07/19",
            'hora' => "19:45",
            'codigoPersonal' => 4,
            'idSalidaEquipo' => 3,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/06/22",
            'hora' => "18:45",
            'codigoPersonal' => 2,
            'idSalidaEquipo' => 14,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/08/24",
            'hora' => "19:33",
            'codigoPersonal' => 8,
            'idSalidaEquipo' => 5,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/05/29",
            'hora' => "15:11",
            'codigoPersonal' => 3,
            'idSalidaEquipo' => 7,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/06/16",
            'hora' => "13:30",
            'codigoPersonal' => 4,
            'idSalidaEquipo' => 9,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/07/16",
            'hora' => "12:22",
            'codigoPersonal' => 5,
            'idSalidaEquipo' => 10,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/04/21",
            'hora' => "15:30",
            'codigoPersonal' => 11,
            'idSalidaEquipo' => 4,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/08/13",
            'hora' => "14:24",
            'codigoPersonal' => 7,
            'idSalidaEquipo' => 3,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/07/14",
            'hora' => "19:00",
            'codigoPersonal' => 12,
            'idSalidaEquipo' => 13,
        ]);

        //---------- TABLA DE SACO ----------//
        saco::create([
            'idSalidaEquipo' => 1,
            'codigoEquipo' => 1,
            'estadoSalida' => "Buen Estado",
        ]);
        saco::create([
            'idSalidaEquipo' => 2,
            'codigoEquipo' => 2,
            'estadoSalida' => "Dañado",
        ]);
        saco::create([
            'idSalidaEquipo' => 5,
            'codigoEquipo' => 11,
            'estadoSalida' => "Mantenimiento",
        ]);
        saco::create([
            'idSalidaEquipo' => 5,
            'codigoEquipo' => 15,
            'estadoSalida' => "Buen Estado",
        ]);
        saco::create([
            'idSalidaEquipo' => 9,
            'codigoEquipo' => 5,
            'estadoSalida' => "Mantenimiento",
        ]);
        saco::create([
            'idSalidaEquipo' => 15,
            'codigoEquipo' => 5,
            'estadoSalida' => "Buen Estado",
        ]);
        saco::create([
            'idSalidaEquipo' => 4,
            'codigoEquipo' => 11,
            'estadoSalida' => "Mantenimiento",
        ]);
        saco::create([
            'idSalidaEquipo' => 7,
            'codigoEquipo' => 8,
            'estadoSalida' => "Buen Estado",
        ]);
        saco::create([
            'idSalidaEquipo' => 5,
            'codigoEquipo' => 10,
            'estadoSalida' => "Mantenimiento",
        ]);

        //---------- TABLA REGRESO ----------//
        regreso::create([
            'idRegresoEquipo' => 1,
            'codigoEquipo' => 1,
            'estadoDevolucion' => "Buen Estado",
        ]);
        regreso::create([
            'idRegresoEquipo' => 1,
            'codigoEquipo' => 15,
            'estadoDevolucion' => "Dañado",
        ]);
        regreso::create([
            'idRegresoEquipo' => 10,
            'codigoEquipo' => 5,
            'estadoDevolucion' => "Dañado",
        ]);
        regreso::create([
            'idRegresoEquipo' => 9,
            'codigoEquipo' => 16,
            'estadoDevolucion' => "Buen Estado",
        ]);
        regreso::create([
            'idRegresoEquipo' => 5,
            'codigoEquipo' => 15,
            'estadoDevolucion' => "Buen Estado",
        ]);
        regreso::create([
            'idRegresoEquipo' => 11,
            'codigoEquipo' => 1,
            'estadoDevolucion' => "Buen Estado",
        ]);
        regreso::create([
            'idRegresoEquipo' => 14,
            'codigoEquipo' => 12,
            'estadoDevolucion' => "Buen Estado",
        ]);
        regreso::create([
            'idRegresoEquipo' => 11,
            'codigoEquipo' => 14,
            'estadoDevolucion' => "Buen Estado",
        ]);
        regreso::create([
            'idRegresoEquipo' => 8,
            'codigoEquipo' => 15,
            'estadoDevolucion' => "Dañado",
        ]);
    }
}
