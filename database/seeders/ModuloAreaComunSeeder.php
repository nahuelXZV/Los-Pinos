<?php

namespace Database\Seeders;

use App\Models\areaComun;
use App\Models\ingresoAc;
use App\Models\invitado;
use App\Models\reporteAc;
use App\Models\reserva;
use App\Models\salidaAc;
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
            'codigo' => 1000,
            'fecha' => '2021/05/11',
            'horaIni' => '10:00',
            'horaFin' => '12:00',
            'cantsPers' => 5,
            'idResidente' => 1,
            'codigoAC' => 104
        ]);
        reserva::create([
            'codigo' => 1001,
            'fecha' => '2021/04/26',
            'horaIni' => '15:00',
            'horaFin' => '18:30',
            'cantsPers' => 10,
            'idResidente' => 3,
            'codigoAC' => 101
        ]);
        reserva::create([
            'codigo' => 1002,
            'fecha' => '2021/03/15',
            'horaIni' => '11:30',
            'horaFin' => '14:00',
            'cantsPers' => 15,
            'idResidente' => 4,
            'codigoAC' => 104
        ]);
        reserva::create([
            'codigo' => 1003,
            'fecha' => '2021/06/24',
            'horaIni' => '16:00',
            'horaFin' => '18:00',
            'cantsPers' => 10,
            'idResidente' => 8,
            'codigoAC' => 104
        ]);
        reserva::create([
            'codigo' => 1004,
            'fecha' => '2021/07/16',
            'horaIni' => '10:00',
            'horaFin' => '13:00',
            'cantsPers' => 8,
            'idResidente' => 9,
            'codigoAC' => 101
        ]);
        reserva::create([
            'codigo' => 1005,
            'fecha' => '2021/01/14',
            'horaIni' => '12:00',
            'horaFin' => '14:30',
            'cantsPers' => 6,
            'idResidente' => 11,
            'codigoAC' => 101
        ]);
        reserva::create([
            'codigo' => 1006,
            'fecha' => '2021/08/11',
            'horaIni' => '10:00',
            'horaFin' => '12:30',
            'cantsPers' => 15,
            'idResidente' => 11,
            'codigoAC' => 101
        ]);

        /*Reporte AC*/

        reporteAc::create([
            'codigo' => 100,
            'reporte' => 'No hubo incidentes durante la reservacion',
            'codigoAC' => 104,
            'codigoRes' => 1001,
        ]);
        reporteAc::create([
            'codigo' => 101,
            'reporte' => 'Se rompio un par de sillas',
            'codigoAC' => 104,
            'codigoRes' => 1002,
        ]);
        reporteAc::create([
            'codigo' => 102,
            'reporte' => 'Se necesito atencion medica para un invitado por cortadora',
            'codigoAC' => 104,
            'codigoRes' => 1003,
        ]);
        reporteAc::create([
            'codigo' => 103,
            'reporte' => 'Se perdieron 5 utensilios ',
            'codigoAC' => 101,
            'codigoRes' => 1004,
        ]);
        reporteAc::create([
            'codigo' => 104,
            'reporte' => 'Se perdió el celular de un visitante',
            'codigoAC' => 102,
            'codigoRes' => 1004,
        ]);

        /* INVITADO */
        invitado::create([
            'idVisitante' => 1,
            'codigoRes' => 1000
        ]);
        invitado::create([
            'idVisitante' => 2,
            'codigoRes' => 1000
        ]);
        invitado::create([
            'idVisitante' => 3,
            'codigoRes' => 1004
        ]);
        invitado::create([
            'idVisitante' => 4,
            'codigoRes' => 1004
        ]);
        invitado::create([
            'idVisitante' => 5,
            'codigoRes' => 1002
        ]);
        invitado::create([
            'idVisitante' => 5,
            'codigoRes' => 1003
        ]);

        /*INGRESO AREA COMUN */
        ingresoAc::create([
            'id' => 1,
            'hora' => '14:00',
            'fecha' => '2021/06/02',
            'idVisitante' => 1,
            'codigoRes' => 1000
        ]);
        ingresoAc::create([
            'id' => 2,
            'hora' => '16:30',
            'fecha' => '2021/03/05',
            'idVisitante' => 5,
            'codigoRes' => 1000
        ]);
        ingresoAc::create([
            'id' => 3,
            'hora' => '15:35',
            'fecha' => '2021/08/22',
            'idVisitante' => 10,
            'codigoRes' => 1001
        ]);
        ingresoAc::create([
            'id' => 4,
            'hora' => '11:25',
            'fecha' => '2021/04/15',
            'idVisitante' => 8,
            'codigoRes' => 1002
        ]);
        ingresoAc::create([
            'id' => 5,
            'hora' => '09:30',
            'fecha' => '2021/09/15',
            'idVisitante' => 10,
            'codigoRes' => 1003
        ]);

        /*SALIDA AREA COMUN */
        salidaAc::create([
            'id' => 1,
            'hora' => '20:30',
            'fecha' => '2021/08/10',
            'idVisitante' => 1,
            'codigoRes' => 1000
        ]);
        salidaAc::create([
            'id' => 2,
            'hora' => '22:00',
            'fecha' => '2021/10/02',
            'idVisitante' => 5,
            'codigoRes' => 1000
        ]);
        salidaAc::create([
            'id' => 3,
            'hora' => '10:00',
            'fecha' => '2021/04/29',
            'idVisitante' => 10,
            'codigoRes' => 1001
        ]);
        salidaAc::create([
            'id' => 4,
            'hora' => '21:00',
            'fecha' => '2021/01/30',
            'idVisitante' => 8,
            'codigoRes' => 1002
        ]);
        salidaAc::create([
            'id' => 5,
            'hora' => '15:00',
            'fecha' => '2021/07/22',
            'idVisitante' => 10,
            'codigoRes' => 1003
        ]);
    }
}
