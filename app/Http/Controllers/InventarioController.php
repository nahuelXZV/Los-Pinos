<?php

namespace App\Http\Controllers;

use App\Models\regresoEquipo;
use App\Models\salidaEquipo;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:equipos')->only('equipos');
        $this->middleware('can:almacenes')->only('almacen');
        $this->middleware('can:salidaEquipos')->only('salida');
        $this->middleware('can:regresoEquipos')->only('regreso');
        $this->middleware('can:salidaEquipos.show')->only('salidaShow');
        $this->middleware('can:regresoEquipos.show')->only('regresoShow');
    }

    public function equipos()
    {
        return view('equipo.equipos');
    }

    public function almacen()
    {
        return view('equipo.almacens');
    }

    public function salida()
    {
        return view('equipo.salidas');
    }

    public function regreso()
    {
        return view('equipo.regresos');
    }

    public function regresoShow($id)
    {
        $regreso = regresoEquipo::find($id);
        return view('equipo.show-regreso', compact('regreso'));
    }

    public function salidaShow($id)
    {
        $salida = salidaEquipo::find($id);
        return view('equipo.show-salida', compact('salida'));
    }
}
