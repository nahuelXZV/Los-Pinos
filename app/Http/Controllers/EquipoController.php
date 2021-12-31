<?php

namespace App\Http\Controllers;

use App\Models\equipo;
use App\Models\regresoEquipo;
use App\Models\salidaEquipo;

class EquipoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:equipos')->only('equipos');
        $this->middleware('can:almacenes')->only('almacens');
        $this->middleware('can:salidaEquipos')->only('salidas');
        $this->middleware('can:regresoEquipos')->only('regresos');
        $this->middleware('can:salidaEquipos.show')->only('show_salidas');
        $this->middleware('can:regresoEquipos.show')->only('show_regresos');
    }

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

    //PDFS
    public function pdfShowRtrabajo($id)
    {
        $reporte = reporteT::find($id);
        $realizos = realizo::where('idReporteT', '=', $reporte->id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.reporteTrabajo', compact('realizos', 'reporte'));
        return $pdf->download('reporte de trabajo: ' . $reporte->fecha . '.pdf');
    }

    public function pdfListaEquipo($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $equipos = equipo::where('codigo', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de asistencias');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.equipoLista', compact('equipos'));
        return $pdf->download('Lista de equipos: ' . now() . '.pdf');
    }
}
