<?php

namespace App\Http\Controllers;

use App\Models\areaComun;
use App\Models\Reserva;
use App\Models\residente;

class ReservaController extends Controller
{

    public function index()
    {
        $areas = areaComun::where('estadoRes', 'Reservacion')->get();
        $residentes = residente::all();
        return view('AreaComun.reserva', compact('areas', 'residentes'));
    }

    public function reservas(Reserva $reserva)
    {
        $reserva = reserva::all();
        return response()->json($reserva);
    }

    public function list()
    {
        return view('AreaComun.list');
    }

    public function show($id)
    {
        $reserva = reserva::find($id);
        return view('AreaComun.show', compact('reserva'));
    }

    public function areas()
    {
        return view('AreaComun.areacomun');
    }

    public function pruebas()
    {
    }
}
