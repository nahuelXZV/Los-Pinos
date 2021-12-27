<?php

namespace App\Http\Controllers;

use App\Models\regresoEquipo;
use App\Models\salidaEquipo;

class EquipoController extends Controller
{

    public function equipos()
    {
        return view('equipo.equipos');
    }

    public function almacens()
    {
        return view('equipo.almacens');
    }

    public function salidas()
    {
        return view('equipo.salidas');
    }

    public function regresos()
    {
        return view('equipo.regresos');
    }

    public function show_regresos($id)
    {
        $regreso = regresoEquipo::find($id);
        return view('equipo.show-regreso', compact('regreso'));
    }

    public function show_salidas($id)
    {
        $salida = salidaEquipo::find($id);
        return view('equipo.show-salida', compact('salida'));
    }
}
