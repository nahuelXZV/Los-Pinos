<?php

namespace Database\Seeders;

use App\Models\ingresoR;
use App\Models\ingresoUrb;
use App\Models\ingresoV;
use App\Models\motorizado;
use App\Models\pertenece;
use App\Models\residente;
use App\Models\salidaR;
use App\Models\salidaUrb;
use App\Models\salidaV;
use App\Models\visitante;
use App\Models\vivienda;
use Illuminate\Database\Seeder;

class ModuloSeguridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*VIVIENDAS */
        vivienda::create([
            'calle' => 'Centenares',
            'manzano' => 1,
            'nroCasa' => 100,
            'lote' => 2,
            'estadoResidencia' => 'Ocupado',
            'estadoVivienda' => 'Vendida'
        ]);
        vivienda::create([
            'calle' => 'Centenares',
            'manzano' => 3,
            'nroCasa' => 110,
            'lote' => 36,
            'estadoResidencia' => 'Desocupado',
            'estadoVivienda' => 'Sin vender'
        ]);
        vivienda::create([
            'calle' => 'Centenares',
            'manzano' => 5,
            'nroCasa' => 250,
            'lote' => 6,
            'estadoResidencia' => 'Ocupado',
            'estadoVivienda' => 'Vendida'
        ]);
        vivienda::create([
            'calle' => 'Centenares',
            'manzano' => 4,
            'nroCasa' => 132,
            'lote' => 49,
            'estadoResidencia' => 'Ocupado',
            'estadoVivienda' => 'Vendida'
        ]);
        vivienda::create([
            'calle' => 'Argentina',
            'manzano' => 12,
            'nroCasa' => 268,
            'lote' => 7,
            'estadoResidencia' => 'Desocupado',
            'estadoVivienda' => 'Sin vender'
        ]);
        vivienda::create([
            'calle' => 'Santa Cruz',
            'manzano' => 10,
            'nroCasa' => 300,
            'lote' => 110,
            'estadoResidencia' => 'Ocupado',
            'estadoVivienda' => 'Vendida'
        ]);
        vivienda::create([
            'calle' => 'Argentina',
            'manzano' => 1,
            'nroCasa' => 211,
            'lote' => 5,
            'estadoResidencia' => 'Desocupado',
            'estadoVivienda' => 'Construccion'
        ]);
        vivienda::create([
            'calle' => 'Argentina',
            'manzano' => 7,
            'nroCasa' => 148,
            'lote' => 70,
            'estadoResidencia' => 'Ocupado',
            'estadoVivienda' => 'Vendida'
        ]);
        vivienda::create([
            'calle' => 'Santa Cruz',
            'manzano' => 9,
            'nroCasa' => 169,
            'lote' => 8,
            'estadoResidencia' => 'Desocupado',
            'estadoVivienda' => 'Vendida'
        ]);
        vivienda::create([
            'calle' => 'Argentina',
            'manzano' => 12,
            'nroCasa' => 152,
            'lote' => 9,
            'estadoResidencia' => 'Ocupado',
            'estadoVivienda' => 'Vendida'
        ]);
        vivienda::create([
            'calle' => 'Santa Cruz',
            'manzano' => 19,
            'nroCasa' => 245,
            'lote' => 10,
            'estadoResidencia' => 'Desocupado',
            'estadoVivienda' => 'Vendida'
        ]);
        vivienda::create([
            'calle' => 'Argentina',
            'manzano' => 20,
            'nroCasa' => 147,
            'lote' => 12,
            'estadoResidencia' => 'Ocupado',
            'estadoVivienda' => 'Vendida'
        ]);



        /*RESIDENTE */
        residente::create([
            'id' => 1,
            'nombre' => 'Pedro Jose Gordillo',
            'sexo' => 'M',
            'nroCarnet' => '524689577',
            'telefono' => '65896524',
            'tipoResidente' => 'Propietario',
            'idVivienda' => 1
        ]);
        residente::create([
            'id' => 2,
            'nombre' => 'Robert Muñoz',
            'sexo' => 'M',
            'nroCarnet' => '216589458',
            'telefono' => '65857854',
            'tipoResidente' => 'Propietario',
            'idVivienda' => 3
        ]);
        residente::create([
            'id' => 3,
            'nombre' => 'Maria Estrella Vivas',
            'sexo' => 'F',
            'nroCarnet' => '124596587',
            'telefono' => '69857877',
            'tipoResidente' => 'Inquilino',
            'idVivienda' => 2
        ]);
        residente::create([
            'id' => 4,
            'nombre' => 'Caridad Rosello',
            'sexo' => 'F',
            'nroCarnet' => '124587954',
            'telefono' => '78458545',
            'tipoResidente' => 'Inquilino',
            'idVivienda' => 10
        ]);
        residente::create([
            'id' => 5,
            'nombre' => 'Jose Andres Serna',
            'sexo' => 'M',
            'nroCarnet' => '52489657',
            'telefono' => '69857842',
            'tipoResidente' => 'Empleado',
            'idVivienda' => 1
        ]);
        residente::create([
            'id' => 6,
            'nombre' => 'Carolina Rus Banegas',
            'sexo' => 'F',
            'nroCarnet' => '654214878',
            'telefono' => '78554888',
            'tipoResidente' => 'Inquilino',
            'idVivienda' => 11
        ]);
        residente::create([
            'id' => 7,
            'nombre' => 'Jose Miguel Aparicio',
            'sexo' => 'M',
            'nroCarnet' => '695874215',
            'telefono' => '77785478',
            'tipoResidente' => 'Propietario',
            'idVivienda' => 2
        ]);
        residente::create([
            'id' => 8,
            'nombre' => 'Aina Clemente Martinez',
            'sexo' => 'F',
            'nroCarnet' => '54879658',
            'telefono' => '69855147',
            'tipoResidente' => 'Inquilino',
            'idVivienda' => 2
        ]);
        residente::create([
            'id' => 9,
            'nombre' => 'Xabier Rueda Perez',
            'sexo' => 'M',
            'nroCarnet' => '452361589',
            'telefono' => '78865545',
            'tipoResidente' => 'Propietario',
            'idVivienda' => 11
        ]);
        residente::create([
            'id' => 10,
            'nombre' => 'Martina Gamero Vargas',
            'sexo' => 'F',
            'nroCarnet' => '548796841',
            'telefono' => '69685247',
            'tipoResidente' => 'Empleado',
            'idVivienda' => null
        ]);
        residente::create([
            'id' => 11,
            'nombre' => 'Ariana Ponce Diaz',
            'sexo' => 'F',
            'nroCarnet' => '214587658',
            'telefono' => '78548554',
            'tipoResidente' => 'Propietario',
            'idVivienda' => 11
        ]);


        /*PERTENECE */
        pertenece::create([
            'idVivienda' => 1,
            'idResidente' => 1
        ]);
        pertenece::create([
            'idVivienda' => 3,
            'idResidente' => 2
        ]);
        pertenece::create([
            'idVivienda' => 11,
            'idResidente' => 2
        ]);
        pertenece::create([
            'idVivienda' => 2,
            'idResidente' => 7
        ]);
        pertenece::create([
            'idVivienda' => 3,
            'idResidente' => 11
        ]);


        /*VISITANTE */
        visitante::create([
            'id' => 1,
            'nombre' => 'Victor Arranz',
            'nroCarnet' => '57352464',
            'sexo' => 'M'
        ]);
        visitante::create([
            'id' => 2,
            'nombre' => 'Yurena Osuna',
            'nroCarnet' => '27596600',
            'sexo' => 'F'
        ]);
        visitante::create([
            'id' => 3,
            'nombre' => 'Daniel Castedo Mendez',
            'nroCarnet' => '27736621',
            'sexo' => 'M'
        ]);
        visitante::create([
            'id' => 4,
            'nombre' => 'Carlos Gutierrez Sandoval',
            'nroCarnet' => '12473384',
            'sexo' => 'M'
        ]);
        visitante::create([
            'id' => 5,
            'nombre' => 'Mariana Graciela Sanchez',
            'nroCarnet' => '38443392',
            'sexo' => 'F'
        ]);
        visitante::create([
            'id' => 6,
            'nombre' => 'Armando Casas Soliz',
            'nroCarnet' => '48500693',
            'sexo' => 'M'
        ]);
        visitante::create([
            'id' => 7,
            'nombre' => 'Pedro Montenegro',
            'nroCarnet' => '49538457',
            'sexo' => 'M'
        ]);
        visitante::create([
            'id' => 8,
            'nombre' => 'Carla Sofia Suarez',
            'nroCarnet' => '59008769',
            'sexo' => 'F'
        ]);
        visitante::create([
            'id' => 9,
            'nombre' => 'Fabiana Fernandez Saavedra',
            'nroCarnet' => '10293384',
            'sexo' => 'F'
        ]);
        visitante::create([
            'id' => 10,
            'nombre' => 'Antonio Vaca',
            'nroCarnet' => '58394857',
            'sexo' => 'M'
        ]);


        /*MOTORIZADO */
        motorizado::create([
            'placa' => '1852PHD',
            'descripcion' => 'Susuki Rojo',
            'idResidente' => 1,
            'idVisitante' =>  null
        ]);
        motorizado::create([
            'placa' => '5147IJH',
            'descripcion' => 'Hyundai Negro',
            'idResidente' => 9,
            'idVisitante' =>  null
        ]);
        motorizado::create([
            'placa' => '6587DES',
            'descripcion' => 'Honda Plateado',
            'idResidente' => 5,
            'idVisitante' =>  null
        ]);
        motorizado::create([
            'placa' => '1654DHF',
            'descripcion' => 'Chevrolet Blanco Perla',
            'idResidente' => 2,
            'idVisitante' =>  null
        ]);
        motorizado::create([
            'placa' => '7915XSD',
            'descripcion' => 'Susuki Rojo',
            'idResidente' => null,
            'idVisitante' =>  5
        ]);


        /*SALIDA URBANIZACION */
        salidaUrb::create([
            'fecha' => '2021/05/13',
            'hora' => '11:00',
            'idMotorizado' => 1
        ]);
        salidaUrb::create([
            'fecha' => '2021/07/15',
            'hora' => '16:00',
            'idMotorizado' => null
        ]);
        salidaUrb::create([
            'fecha' => '2021/10/02',
            'hora' => '20:00',
            'idMotorizado' => null
        ]);
        salidaUrb::create([
            'fecha' => '2021/05/01',
            'hora' => '10:30',
            'idMotorizado' => null
        ]);
        salidaUrb::create([
            'fecha' => '2021/09/22',
            'hora' => '15:00',
            'idMotorizado' => 4
        ]);
        salidaUrb::create([
            'fecha' => '2021/08/31',
            'hora' => '08:00',
            'idMotorizado' => null
        ]);
        salidaUrb::create([
            'fecha' => '2021/06/10',
            'hora' => '20:20',
            'idMotorizado' => null
        ]);
        salidaUrb::create([
            'fecha' => '2021/07/14',
            'hora' => '19:28',
            'idMotorizado' => 3
        ]);
        salidaUrb::create([
            'fecha' => '2021/08/07',
            'hora' => '18:34',
            'idMotorizado' => 1
        ]);
        salidaUrb::create([
            'fecha' => '2021/04/21',
            'hora' => '17:55',
            'idMotorizado' => null
        ]);

        /*INGRESO URBANIZACION*/
        ingresoUrb::create([
            'fecha' => '2021/07/01',
            'hora' => '12:00',
            'motivo' => 'Visita',
            'idVivienda' => 1,
            'idMotorizado' => 1
        ]);
        ingresoUrb::create([
            'fecha' => '2021/02/10',
            'hora' => '08:40',
            'motivo' => 'Mantenimiento',
            'idVivienda' => null,
            'idMotorizado' => null
        ]);
        ingresoUrb::create([
            'fecha' => '2021/09/27',
            'hora' => '20:30',
            'motivo' => 'Residente',
            'idVivienda' => 5,
            'idMotorizado' => null
        ]);
        ingresoUrb::create([
            'fecha' => '2021/10/22',
            'hora' => '05:40',
            'motivo' => 'Trabajo',
            'idVivienda' => 7,
            'idMotorizado' => null
        ]);
        ingresoUrb::create([
            'fecha' => '2021/05/12',
            'hora' => '10:00',
            'motivo' => 'Visita',
            'idVivienda' => 7,
            'idMotorizado' => 4
        ]);
        ingresoUrb::create([
            'fecha' => '2021/10/22',
            'hora' => '09:50',
            'motivo' => 'Mantenimiento',
            'idVivienda' => null,
            'idMotorizado' => null
        ]);
        ingresoUrb::create([
            'fecha' => '2021/01/29',
            'hora' => '15:30',
            'motivo' => 'Residente',
            'idVivienda' => 3,
            'idMotorizado' => null
        ]);
        ingresoUrb::create([
            'fecha' => '2021/04/11',
            'hora' => '22:00',
            'motivo' => 'Residente',
            'idVivienda' => 1,
            'idMotorizado' => 1
        ]);
        ingresoUrb::create([
            'fecha' => '2021/10/01',
            'hora' => '11:00',
            'motivo' => 'Trabajo',
            'idVivienda' => 1,
            'idMotorizado' => 1
        ]);
        ingresoUrb::create([
            'fecha' => '2021/06/02',
            'hora' => '09:30',
            'motivo' => 'Visita',
            'idVivienda' => 7,
            'idMotorizado' => null
        ]);

        /*Salida R */
        salidaR::create([
            'idResidente' => 1,
            'idSalidaUrb' => 1
        ]);
        salidaR::create([
            'idResidente' => 6,
            'idSalidaUrb' => 2
        ]);
        salidaR::create([
            'idResidente' => 10,
            'idSalidaUrb' => 3
        ]);
        salidaR::create([
            'idResidente' => 10,
            'idSalidaUrb' => 4
        ]);
        salidaR::create([
            'idResidente' => 8,
            'idSalidaUrb' => 5
        ]);

        /* Salida V */
        salidaV::create([
            'idVisitante' => 1,
            'idSalidaUrb' => 1
        ]);
        salidaV::create([
            'idVisitante' => 5,
            'idSalidaUrb' => 5
        ]);
        salidaV::create([
            'idVisitante' => 7,
            'idSalidaUrb' => 9
        ]);
        salidaV::create([
            'idVisitante' => 9,
            'idSalidaUrb' => 1
        ]);
        salidaV::create([
            'idVisitante' => 10,
            'idSalidaUrb' => 5
        ]);

        /*Ingreso V */
        ingresoV::create([
            'idVisitante' => 1,
            'idIngresoUrb' => 1
        ]);
        ingresoV::create([
            'idVisitante' => 5,
            'idIngresoUrb' => 1
        ]);
        ingresoV::create([
            'idVisitante' => 7,
            'idIngresoUrb' => 5
        ]);
        ingresoV::create([
            'idVisitante' => 9,
            'idIngresoUrb' => 8
        ]);
        ingresoV::create([
            'idVisitante' => 10,
            'idIngresoUrb' => 3
        ]);

        /*Ingreso R */
        ingresoR::create([
            'idResidente' => 1,
            'idIngresoUrb' => 3
        ]);
        ingresoR::create([
            'idResidente' => 6,
            'idIngresoUrb' => 7
        ]);
        ingresoR::create([
            'idResidente' => 10,
            'idIngresoUrb' => 8
        ]);
        ingresoR::create([
            'idResidente' => 7,
            'idIngresoUrb' => 7
        ]);
        ingresoR::create([
            'idResidente' => 8,
            'idIngresoUrb' => 9
        ]);
    }
}
