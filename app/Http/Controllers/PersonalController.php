<?php

namespace App\Http\Controllers;

use App\Models\personal;
use App\Models\reporteA;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:personal')->only('personal');
        $this->middleware('can:trabajos')->only('trabajos');
        $this->middleware('can:seccion')->only('seccion');
        $this->middleware('can:horario')->only('horario');
        $this->middleware('can:reporteAsistencia')->only('reportes');
        $this->middleware('can:reporteAsistencia.show')->only('reportes');
        $this->middleware('can:reporteTrabajo')->only('reportes');
        $this->middleware('can:reporteTrabajo.show')->only('reportes');
    }

    public function personal()
    {
        return view('Personal.personal');
    }
    public function datos($id)
    {
        $personal = personal::find($id);
        return view('Personal.datospersonal', compact('personal'));
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
