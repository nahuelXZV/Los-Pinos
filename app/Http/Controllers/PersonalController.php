<?php

namespace App\Http\Controllers;

use App\Models\reporteA;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function personal()
    {
        return view('Personal.personal');
    }
    public function trabajos()
    {
        return view('Personal.trabajos');
    }
    public function seccion()
    {
        return view('Personal.seccion');
    }
    public function horario()
    {
        return view('Personal.horario');
    }

    public function reportes()
    {
        return view('Personal.reporteA');
    }

    public function permisos($id)
    {
        $reporte = reporteA::find($id);
        return view('Personal.permisos', compact('reporte'));
    }
}
