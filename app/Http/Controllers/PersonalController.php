<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use App\Models\ingresoPersonal;
use App\Models\permiso;
use App\Models\personal;
use App\Models\realizo;
use App\Models\reporteA;
use App\Models\reporteT;
use App\Models\salidaPersonal;
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

    public function reportes_trabajo()
    {
        return view('Personal.reporteT');
    }

    public function trabajo_realizado($id)
    {
        $reporte = reporteT::find($id);
        return view('Personal.trabajo-realizado', compact('reporte'));
    }



    //PDFS
    public function pdfShowRtrabajo($id)
    {
        $reporte = reporteT::find($id);
        $realizos = realizo::where('idReporteT', '=', $reporte->id)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de detalles de trabajos de código: ' . $id);


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.reporteTrabajo', compact('realizos', 'reporte'));
        return $pdf->download('reporte de trabajo: ' . $reporte->fecha . '.pdf');
    }

    public function pdfListaRtrabajo($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $reportes = reporteT::where('codPersonal', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de trabajos');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.reporteTrabajoLista', compact('reportes'));
        return $pdf->download('reportes de trabajos: ' . now() . '.pdf');
    }


    public function pdfShowRasistencua($id)
    {
        $reporte = reporteA::find($id);
        $permisos = permiso::where('idReporteA', '=', $id)->get();
        $ingresos = ingresoPersonal::where('idReporteA', '=', $id)->get();
        $salidas = salidaPersonal::where('idReporteA', '=', $id)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de detalles de asistencia de código: ' . $id);


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.reporteAsistencia', compact('reporte', 'permisos', 'ingresos', 'salidas'));
        return $pdf->download('reporte de asistencia: ' . $reporte->fecha . '.pdf');
    }

    public function pdfListaRasistencia($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $reportes = reporteA::where('codigoPersonal', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de asistencias');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.reporteAsistenciaLista', compact('reportes'));
        return $pdf->download('reportes de asistencias: ' . now() . '.pdf');
    }
}
