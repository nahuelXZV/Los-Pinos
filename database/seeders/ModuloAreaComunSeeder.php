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
            'codigo' => 101,
            'nombre' => 'Piscina',
            'calle' => 'Centenares',
            'manzano' => 3,
            'estadoRes' => 'Reservacion'
        ]);
        areaComun::create([
            'codigo' => 102,
            'nombre' => 'Mercado Principal',
            'calle' => 'Argentina',
            'manzano' => 6,
            'estadoRes' => 'No reservacion'
        ]);
        areaComun::create([
            'codigo' => 103,
            'nombre' => 'Mercado Vimax',
            'calle' => 'Santa Cruz',
            'manzano' => 1,
            'estadoRes' => 'No reservacion'
        ]);
        areaComun::create([
            'codigo' => 104,
            'nombre' => 'Churrasqueria',
            'calle' => 'España',
            'manzano' => 5,
            'estadoRes' => 'Reservacion'
        ]);
        areaComun::create([
            'codigo' => 105,
            'nombre' => 'Plaza Central',
            'calle' => 'Portugal',
            'manzano' => 9,
            'estadoRes' => 'No reservacion'
        ]);
        areaComun::create([
            'codigo' => 106,
            'nombre' => 'Plaza Hormiguita',
            'calle' => 'España',
            'manzano' => 5,
            'estadoRes' => 'No reservacion'
        ]);
        areaComun::create([
            'codigo' => 107,
            'nombre' => 'Salon de Eventos',
            'calle' => 'Santa Cruz',
            'manzano' => 11,
            'estadoRes' => 'Reservacion'
        ]);

        /*RESERVA */
        reserva::create([
            'id' => 1000,
            'fecha' => '2021/05/11',
            'horaIni' => '10:00',
            'horaFin' => '12:00',
            'cantsPers' => 5,
            'idResidente' => 1,
            'codigoAC' => 104
        ]);
        reserva::create([
            'id' => 1001,
            'fecha' => '2021/04/26',
            'horaIni' => '15:00',
            'horaFin' => '18:30',
            'cantsPers' => 10,
            'idResidente' => 3,
            'codigoAC' => 101
        ]);
        reserva::create([
            'id' => 1002,
            'fecha' => '2021/03/15',
            'horaIni' => '11:30',
            'horaFin' => '14:00',
            'cantsPers' => 15,
            'idResidente' => 4,
            'codigoAC' => 104
        ]);
        reserva::create([
            'id' => 1003,
            'fecha' => '2021/06/24',
            'horaIni' => '16:00',
            'horaFin' => '18:00',
            'cantsPers' => 10,
            'idResidente' => 8,
            'codigoAC' => 104
        ]);
        reserva::create([
            'id' => 1004,
            'fecha' => '2021/07/16',
            'horaIni' => '10:00',
            'horaFin' => '13:00',
            'cantsPers' => 8,
            'idResidente' => 9,
            'codigoAC' => 101
        ]);
        reserva::create([
            'id' => 1005,
            'fecha' => '2021/01/14',
            'horaIni' => '12:00',
            'horaFin' => '14:30',
            'cantsPers' => 6,
            'idResidente' => 11,
            'codigoAC' => 101
        ]);
        reserva::create([
            'id' => 1006,
            'fecha' => '2021/08/11',
            'horaIni' => '10:00',
            'horaFin' => '12:30',
            'cantsPers' => 15,
            'idResidente' => 11,
            'codigoAC' => 101
        ]);

        /*Reporte AC*/

        reporteAc::create([
            'id' => 100,
            'reporte' => 'No hubo incidentes durante la reservacion',
            'codigoAC' => 104,
            'codigoRes' => 1001,
        ]);
        reporteAc::create([
            'id' => 101,
            'reporte' => 'Se rompio un par de sillas',
            'codigoAC' => 104,
            'codigoRes' => 1002,
        ]);
        reporteAc::create([
            'id' => 102,
            'reporte' => 'Se necesito atencion medica para un invitado por cortadora',
            'codigoAC' => 104,
            'codigoRes' => 1003,
        ]);
        reporteAc::create([
            'id' => 103,
            'reporte' => 'Se perdieron 5 utensilios ',
            'codigoAC' => 101,
            'codigoRes' => 1004,
        ]);
        reporteAc::create([
            'id' => 104,
            'reporte' => 'Se perdió el celular de un visitante',
            'codigoAC' => 102,
            'codigoRes' => 1004,
        ]);

        /* INVITADO */
        invitado::create([
            'id' => 1,
            'idVisitante' => 1,
            'codigoRes' => 1000
        ]);
        invitado::create([
            'id' => 2,
            'idVisitante' => 2,
            'codigoRes' => 1000,
            'horaIngreso' => '12:00',
            'horaSalida' => null
        ]);
        invitado::create([
            'id' => 3,
            'idVisitante' => 3,
            'codigoRes' => 1004,
            'horaIngreso' => '13:00',
            'horaSalida' => '20:00'
        ]);
        invitado::create([
            'id' => 4,
            'idVisitante' => 4,
            'codigoRes' => 1004,
            'horaIngreso' => '12:00',
            'horaSalida' => '15:00'
        ]);
        invitado::create([
            'id' => 5,
            'idVisitante' => 5,
            'codigoRes' => 1002
        ]);
        invitado::create([
            'id' => 6,
            'idVisitante' => 5,
            'codigoRes' => 1003
        ]);
    }
}
