<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use App\Models\personal;
use App\Models\almacen;
use App\Models\regresoEquipo;
use App\Models\salidaEquipo;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:equipos')->only('index');
        $this->middleware('can:almacenes')->only('almacens');
        $this->middleware('can:salidaEquipos')->only('salidas');
        $this->middleware('can:regresoEquipos')->only('regresos');
        $this->middleware('can:salidaEquipos.show')->only('show_salidas');
        $this->middleware('can:regresoEquipos.show')->only('show_regresos');
    }

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
        return view('equipo.show-regreso', compact('regreso'));
    }

    public function show_salidas($id)
    {
        $salida = salidaEquipo::find($id);
        return view('equipo.show-salida', compact('salida'));
    }
}
