<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use App\Models\personal;
use App\Models\almacen;

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
}
