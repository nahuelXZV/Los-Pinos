<?php

namespace Database\Seeders;

use App\Models\areaComun;
use App\Models\invitado;
use App\Models\reporteAc;
use App\Models\reserva;
use Illuminate\Database\Seeder;

class ModuloAreaComunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /* AREA COMUN */
        areaComun::create([
            'nombre' => 'Piscina',
            'calle' => 'Centenares',
            'manzano' => 3,
            'estadoRes' => 'Reservación'
        ]);
        areaComun::create([
            'nombre' => 'Mercado Principal',
            'calle' => 'Argentina',
            'manzano' => 6,
            'estadoRes' => 'No Reservación'
        ]);
        areaComun::create([
            'nombre' => 'Mercado Vimax',
            'calle' => 'Santa Cruz',
            'manzano' => 1,
            'estadoRes' => 'No Reservación'
        ]);
        areaComun::create([
            'nombre' => 'Churrasqueria',
            'calle' => 'España',
            'manzano' => 5,
            'estadoRes' => 'Reservación'
        ]);
        areaComun::create([
            'nombre' => 'Plaza Central',
            'calle' => 'Portugal',
            'manzano' => 9,
            'estadoRes' => 'No Reservación'
        ]);
        areaComun::create([
            'nombre' => 'Plaza Hormiguita',
            'calle' => 'España',
            'manzano' => 5,
            'estadoRes' => 'No Reservación'
        ]);
        areaComun::create([
            'nombre' => 'Salon de Eventos',
            'calle' => 'Santa Cruz',
            'manzano' => 11,
            'estadoRes' => 'Reservación'
        ]);

        /*RESERVA */
        reserva::create([
            'fecha' => '2021/05/11',
            'horaIni' => '10:00',
            'horaFin' => '12:00',
            'cantsPers' => 5,
            'idResidente' => 1,
            'codigoAC' => 4
        ]);
        reserva::create([
            'fecha' => '2021/04/26',
            'horaIni' => '15:00',
            'horaFin' => '18:30',
            'cantsPers' => 10,
            'idResidente' => 3,
            'codigoAC' => 1
        ]);
        reserva::create([
            'fecha' => '2021/03/15',
            'horaIni' => '11:30',
            'horaFin' => '14:00',
            'cantsPers' => 15,
            'idResidente' => 4,
            'codigoAC' => 4
        ]);
        reserva::create([
            'fecha' => '2021/06/24',
            'horaIni' => '16:00',
            'horaFin' => '18:00',
            'cantsPers' => 10,
            'idResidente' => 8,
            'codigoAC' => 4
        ]);
        reserva::create([
            'fecha' => '2021/07/16',
            'horaIni' => '10:00',
            'horaFin' => '13:00',
            'cantsPers' => 8,
            'idResidente' => 9,
            'codigoAC' => 1
        ]);
        reserva::create([
            'fecha' => '2021/01/14',
            'horaIni' => '12:00',
            'horaFin' => '14:30',
            'cantsPers' => 6,
            'idResidente' => 11,
            'codigoAC' => 1
        ]);
        reserva::create([
            'fecha' => '2021/08/11',
            'horaIni' => '10:00',
            'horaFin' => '12:30',
            'cantsPers' => 15,
            'idResidente' => 11,
            'codigoAC' => 1
        ]);

        /*Reporte AC*/

        reporteAc::create([
            'reporte' => 'No hubo incidentes durante la reservacion',
            'codigoAC' => 4,
            'codigoRes' => 1,
        ]);
        reporteAc::create([
            'reporte' => 'Se rompio un par de sillas',
            'codigoAC' => 4,
            'codigoRes' => 2,
        ]);
        reporteAc::create([
            'reporte' => 'Se necesito atencion medica para un invitado por cortadora',
            'codigoAC' => 4,
            'codigoRes' => 3,
        ]);
        reporteAc::create([
            'reporte' => 'Se perdieron 5 utensilios ',
            'codigoAC' => 1,
            'codigoRes' => 4,
        ]);
        reporteAc::create([
            'reporte' => 'Se perdió el celular de un visitante',
            'codigoAC' => 2,
            'codigoRes' => 4,
        ]);

        /* INVITADO */
        invitado::create([
            'idVisitante' => 1,
            'codigoRes' => 1
        ]);
        invitado::create([
            'idVisitante' => 2,
            'codigoRes' => 1,
            'horaIngreso' => '12:00',
            'horaSalida' => null
        ]);
        invitado::create([
            'idVisitante' => 3,
            'codigoRes' => 4,
            'horaIngreso' => '13:00',
            'horaSalida' => '20:00'
        ]);
        invitado::create([
            'idVisitante' => 4,
            'codigoRes' => 4,
            'horaIngreso' => '12:00',
            'horaSalida' => '15:00'
        ]);
        invitado::create([
            'idVisitante' => 5,
            'codigoRes' => 2
        ]);
        invitado::create([
            'idVisitante' => 5,
            'codigoRes' => 3
        ]);
    }
}
