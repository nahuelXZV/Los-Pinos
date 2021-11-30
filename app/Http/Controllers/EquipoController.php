<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use App\Models\personal;
use App\Models\almacen;
use App\Models\regresoEquipo;
use App\Models\salidaEquipo;

class EquipoController extends Controller
{
    public function index()
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
        return view('equipo.show-regreso-equipo', compact('regreso'));
    }

    public function show_salidas($id)
    {
        $salida = salidaEquipo::find($id);
        return view('equipo.show-salida', compact('salida'));
    }
}