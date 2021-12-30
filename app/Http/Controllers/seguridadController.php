<?php

namespace App\Http\Controllers;

use App\Models\ingresoUrb;
use App\Models\salidaUrb;
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
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.salida', compact('salida', 'listaVisitantes', 'listaResidentes'));
        return $pdf->download('reporte salida de ' . $salida->fecha);
    }

    public function pdfingreso($id)
    {
        $ingreso  = ingresoUrb::find($id);
        $listaVisitantes = ingresoUrb::find($id)->ingresoV()->get();
        $listaResidentes = ingresoUrb::find($id)->ingresoR()->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.ingreso', compact('ingreso', 'listaVisitantes', 'listaResidentes'));
        return $pdf->download('reporte ingreso de ' . $ingreso->fecha);
    }


    public function pdfsalidalista($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $salidas = salidaUrb::where('fecha', 'like', '%' . $search . '%')
            ->orWhere('idMotorizado', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
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
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.ingresolista', compact('ingresos'));
        return $pdf->download('reporte de ingresos: ' . now() . '.pdf');
    }
}
