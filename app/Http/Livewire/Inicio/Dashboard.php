<?php

namespace App\Http\Livewire\Inicio;

use App\Models\equipo;
use App\Models\reserva;
use App\Models\residente;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Dashboard extends Component
{
    public function render()
    {
        $CResidente = DB::table('residentes')->count();
        $CVisitantes = DB::table('visitantes')->count();
        $CMotorizados = DB::table('motorizados')->count();
        $Cpersonal = DB::table('personals')->where('estado', 'Activo')->count();
        $CViviendas = DB::table('viviendas')->count();
        $CAreasComunes = DB::table('area_comuns')->count();
        $CReservas = DB::table('reservas')->where('fecha', '>=', Carbon::now()->toDateString())->count();
        $Reservas = reserva::where('fecha', '=', Carbon::now()->toDateString())
            ->orderBy('horaIni', 'asc')->get();
        $equipos = equipo::all();
        return view('livewire.inicio.dashboard', compact('CResidente', 'CVisitantes', 'Cpersonal', 'CMotorizados', 'CViviendas', 'CAreasComunes', 'CReservas', 'Reservas', 'equipos'));
    }
}
