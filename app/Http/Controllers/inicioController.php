<?php

namespace App\Http\Controllers;

use App\Models\regresoEquipo;
use App\Models\salidaEquipo;
use Illuminate\Support\Facades\DB;

class inicioController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:inicio')->only('dashboard');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function equipos()
    {
        return view('Equipo.equipos');
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
