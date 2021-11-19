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
            'codigo' => 1000,
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
            'codigo' => 1001,
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
            'codigo' => 1002,
            'nombre' => "soplador",
            'modelo' => "2015",
            'marca' => "Limpia Todo",
            'descripcion' => "Maquina que sopla",
            'multiplicidad' => "Unico",
            'stock' => null,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Mantenimiento",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'codigo' => 1003,
            'nombre' => "aspiradora",
            'modelo' => "2020",
            'marca' => "Aseo Natural",
            'descripcion' => "Maquina que aspira",
            'multiplicidad' => "Unico",
            'stock' => null,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Dañado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'codigo' => 1004,
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
            'codigo' => 1005,
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
            'codigo' => 1006,
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
            'codigo' => 1007,
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
            'codigo' => 1008,
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
            'codigo' => 1009,
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
            'codigo' => 1010,
            'nombre' => "corta cesped",
            'modelo' => "2015",
            'marca' => "Aseo Natural",
            'descripcion' => "Maquina para cortar o podar cesped",
            'multiplicidad' => "Unico",
            'stock' => null,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'codigo' => 1011,
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
            'codigo' => 1012,
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
            'codigo' => 1013,
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
            'codigo' => 1014,
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
            'codigo' => 1015,
            'nombre' => "maquina desinfectante",
            'modelo' => "2015",
            'marca' => "AntiVirus",
            'descripcion' => "Maquina para desinfectar en porteria a las personas",
            'multiplicidad' => "Unico",
            'stock' => null,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Dañado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'codigo' => 1016,
            'nombre' => "escalera",
            'modelo' => "2018",
            'marca' => "Eco Limpieza",
            'descripcion' => "Escalera para subir a lugares elevados",
            'multiplicidad' => "Unico",
            'stock' => null,
            'estadoServicio' => "Inactivo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'codigo' => 1017,
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
            'codigo' => 1018,
            'nombre' => "radiocomunicador",
            'modelo' => "2018",
            'marca' => "Caterpilar",
            'descripcion' => "Aparato para comunicacion a corta y media distancia",
            'multiplicidad' => "Unico",
            'stock' => null,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Dañado",
            'idAlmacen' => 2,
        ]);
        equipo::create([
            'codigo' => 1019,
            'nombre' => "equipo para churrasquera",
            'modelo' => "2020",
            'marca' => "CarneMaster",
            'descripcion' => "Todo tipo de cubiertos, y herramienta necesarias para un churrasco",
            'multiplicidad' => "Unico",
            'stock' => null,
            'estadoServicio' => "Activo",
            'estadoFuncionamiento' => "Buen Estado",
            'idAlmacen' => 1,
        ]);
        equipo::create([
            'codigo' => 1020,
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
            'codigoPersonal' => 110,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/06/23",
            'hora' => "13:30",
            'motivo' => "Para Desechar",
            'codigoPersonal' => 101,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/07/19",
            'hora' => "14:45",
            'motivo' => "Para mantenimiento",
            'codigoPersonal' => 104,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/04/21",
            'hora' => "10:30",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 111,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/08/24",
            'hora' => "16:33",
            'motivo' => "Para mantenimiento",
            'codigoPersonal' => 108,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/04/20",
            'hora' => "14:20",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 104,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/07/21",
            'hora' => "17:11",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 102,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/09/25",
            'hora' => "15:35",
            'motivo' => "Para mantenimiento",
            'codigoPersonal' => 107,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/06/16",
            'hora' => "11:30",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 104,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/07/16",
            'hora' => "11:22",
            'motivo' => "Para mantenimiento",
            'codigoPersonal' => 105,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/08/21",
            'hora' => "9:22",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 109,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/08/29",
            'hora' => "9:50",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 110,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/07/14",
            'hora' => "15:00",
            'motivo' => "Para Desechar",
            'codigoPersonal' => 112,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/06/22",
            'hora' => "13:25",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 102,
        ]);
        salidaEquipo::create([
            'fecha' => "2021/04/25",
            'hora' => "16:21",
            'motivo' => "Para trabajo",
            'codigoPersonal' => 105,
        ]);

        //---------- TABLA DE REGRESO EQUIPO ----------//
        regresoEquipo::create([
            'fecha' => "2021/08/23",
            'hora' => "13:22",
            'codigoPersonal' => 109,
            'idSalidaEquipo' => 11,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/09/25",
            'hora' => "16:35",
            'codigoPersonal' => 107,
            'idSalidaEquipo' => 8,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/05/13",
            'hora' => "14:00",
            'codigoPersonal' => 110,
            'idSalidaEquipo' => 1,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/10/12",
            'hora' => "20:45",
            'codigoPersonal' => 109,
            'idSalidaEquipo' => 8,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/04/20",
            'hora' => "15:20",
            'codigoPersonal' => 104,
            'idSalidaEquipo' => 6,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/07/19",
            'hora' => "19:45",
            'codigoPersonal' => 104,
            'idSalidaEquipo' => 3,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/06/22",
            'hora' => "18:45",
            'codigoPersonal' => 102,
            'idSalidaEquipo' => 14,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/08/24",
            'hora' => "19:33",
            'codigoPersonal' => 108,
            'idSalidaEquipo' => 5,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/05/29",
            'hora' => "15:11",
            'codigoPersonal' => 103,
            'idSalidaEquipo' => 7,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/06/16",
            'hora' => "13:30",
            'codigoPersonal' => 104,
            'idSalidaEquipo' => 9,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/07/16",
            'hora' => "12:22",
            'codigoPersonal' => 105,
            'idSalidaEquipo' => 10,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/04/21",
            'hora' => "15:30",
            'codigoPersonal' => 111,
            'idSalidaEquipo' => 4,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/08/13",
            'hora' => "14:24",
            'codigoPersonal' => 107,
            'idSalidaEquipo' => 3,
        ]);
        regresoEquipo::create([
            'fecha' => "2021/07/14",
            'hora' => "19:00",
            'codigoPersonal' => 112,
            'idSalidaEquipo' => 13,
        ]);

        //---------- TABLA DE SACO ----------//
        saco::create([
            'idSalidaEquipo' => 1,
            'codigoEquipo' => 1000,
            'estadoSalida' => "Buen Estado",
        ]);
        saco::create([
            'idSalidaEquipo' => 2,
            'codigoEquipo' => 1001,
            'estadoSalida' => "Dañado",
        ]);
        saco::create([
            'idSalidaEquipo' => 5,
            'codigoEquipo' => 1010,
            'estadoSalida' => "Mantenimiento",
        ]);
        saco::create([
            'idSalidaEquipo' => 5,
            'codigoEquipo' => 1015,
            'estadoSalida' => "Buen Estado",
        ]);
        saco::create([
            'idSalidaEquipo' => 9,
            'codigoEquipo' => 1005,
            'estadoSalida' => "Mantenimiento",
        ]);
        saco::create([
            'idSalidaEquipo' => 15,
            'codigoEquipo' => 1005,
            'estadoSalida' => "Buen Estado",
        ]);
        saco::create([
            'idSalidaEquipo' => 4,
            'codigoEquipo' => 1011,
            'estadoSalida' => "Mantenimiento",
        ]);
        saco::create([
            'idSalidaEquipo' => 7,
            'codigoEquipo' => 1008,
            'estadoSalida' => "Buen Estado",
        ]);
        saco::create([
            'idSalidaEquipo' => 5,
            'codigoEquipo' => 1010,
            'estadoSalida' => "Mantenimiento",
        ]);

        //---------- TABLA REGRESO ----------//
        regreso::create([
            'idRegresoEquipo' => 1,
            'codigoEquipo' => 1000,
            'estadoDevolucion' => "Buen Estado", 
        ]);
        regreso::create([
            'idRegresoEquipo' => 1,
            'codigoEquipo' => 1015,
            'estadoDevolucion' => "Dañado", 
        ]);
        regreso::create([
            'idRegresoEquipo' => 10,
            'codigoEquipo' => 1005,
            'estadoDevolucion' => "Dañado", 
        ]);
        regreso::create([
            'idRegresoEquipo' => 9,
            'codigoEquipo' => 1016,
            'estadoDevolucion' => "Buen Estado", 
        ]);
        regreso::create([
            'idRegresoEquipo' => 5,
            'codigoEquipo' => 1015,
            'estadoDevolucion' => "Buen Estado", 
        ]);
        regreso::create([
            'idRegresoEquipo' => 11,
            'codigoEquipo' => 1001,
            'estadoDevolucion' => "Buen Estado", 
        ]);
        regreso::create([
            'idRegresoEquipo' => 14,
            'codigoEquipo' => 1020,
            'estadoDevolucion' => "Buen Estado", 
        ]);
        regreso::create([
            'idRegresoEquipo' => 11,
            'codigoEquipo' => 1016,
            'estadoDevolucion' => "Buen Estado", 
        ]);
        regreso::create([
            'idRegresoEquipo' => 8,
            'codigoEquipo' => 1016,
            'estadoDevolucion' => "Dañado", 
        ]);
    }
}