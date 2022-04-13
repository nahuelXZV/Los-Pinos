<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use App\Models\ingresoUrb;
use App\Models\motorizado;
use App\Models\residente;
use App\Models\salidaUrb;
use App\Models\visitante;
use App\Models\vivienda;
use Illuminate\Http\Request;

class seguridadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:residentes')->only('residentes');
        $this->middleware('can:visitantes')->only('visitantes');
        $this->middleware('can:motorizados')->only('motorizados');
        $this->middleware('can:viviendas')->only('viviendas');
        $this->middleware('can:ingresos')->only('ingresos');
        $this->middleware('can:salidas')->only('salidas');
        $this->middleware('can:ingresos.show')->only('showIngreso');
        $this->middleware('can:salidas.show')->only('showSalida');
    }
    public function residentes()
    {
        return view('seguridad.residente');
    }
    public function visitantes()
    {
        return view('seguridad.visitante');
    }
    public function motorizados()
    {
        return view('seguridad.motorizado');
    }
    public function viviendas()
    {
        return view('seguridad.vivienda');
    }
    public function ingresos()
    {
        return view('seguridad.ingreso');
    }
    public function salidas()
    {
        return view('seguridad.salida');
    }
    public function showIngreso($id)
    {
        $ingreso = ingresoUrb::find($id);
        return view('seguridad.showIngreso', compact('ingreso'));
    }
    public function showSalida($id)
    {
        $salida = salidaUrb::find($id);
        return view('seguridad.showSalida', compact('salida'));
    }


    //PDFS
    public function pdfsalida($id)
    {
        $salida  = salidaUrb::find($id);
        $listaResidentes = salidaUrb::find($id)->salidaR()->get();
        $listaVisitantes = salidaUrb::find($id)->salidaV()->get();

        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de detalles de salidas de código: ' . $id);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.salida', compact('salida', 'listaVisitantes', 'listaResidentes'));
        return $pdf->download('reporte salida de ' . $salida->fecha  . '.pdf');
    }

    public function pdfingreso($id)
    {
        $ingreso  = ingresoUrb::find($id);
        $listaVisitantes = ingresoUrb::find($id)->ingresoV()->get();
        $listaResidentes = ingresoUrb::find($id)->ingresoR()->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de detalles de ingresos de código: ' . $id);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.ingreso', compact('ingreso', 'listaVisitantes', 'listaResidentes'));
        return $pdf->download('reporte ingreso de ' . $ingreso->fecha  . '.pdf');
    }


    public function pdfsalidalista($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';

        $salidas = salidaUrb::where('fecha', 'like', '%' . $search . '%')
            ->orWhere('idMotorizado', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();

        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de salidas');

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.salidalista', compact('salidas'));
        return $pdf->download('reporte de salidas: ' . now() . '.pdf');
    }

    public function pdfingresolista($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';

        $ingresos = ingresoUrb::where('fecha', 'like', '%' . $search . '%')
            ->orWhere('motivo', 'like', '%' . $search . '%')
            ->orWhere('idVivienda', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();

        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de ingresos');

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.ingresolista', compact('ingresos'));
        return $pdf->download('reporte de ingresos: ' . now() . '.pdf');
    }

    public function pdfListaResidente($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $residentes = residente::where('id', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de residentes');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.residenteLista', compact('residentes'));
        return $pdf->download('Lista de residentes: ' . now() . '.pdf');
    }

    public function pdfListaVisitante($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $visitantes = visitante::where('id', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de visitantes');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.visitanteLista', compact('visitantes'));
        return $pdf->download('Lista de visitantes: ' . now() . '.pdf');
    }

    public function pdfListaMotorizado($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $motorizados = motorizado::where('id', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de motorizados');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.motorizadoLista', compact('motorizados'));
        return $pdf->download('Lista de motorizados: ' . now() . '.pdf');
    }

    public function pdfListaVivienda($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $viviendas = vivienda::where('id', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de viviendas');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.viviendaLista', compact('viviendas'));
        return $pdf->download('Lista de viviendas: ' . now() . '.pdf');
    }
}
