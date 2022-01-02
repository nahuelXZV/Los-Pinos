<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use App\Models\equipo;
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
        return view('Equipo.almacens');
    }

    public function salidas()
    {
        return view('Equipo.salidas');
    }

    public function regresos()
    {
        return view('Equipo.regresos');
    }

    public function show_regresos($id)
    {
        $regreso = regresoEquipo::find($id);
        return view('Equipo.show-regreso', compact('regreso'));
    }

    public function show_salidas($id)
    {
        $salida = salidaEquipo::find($id);
        return view('Equipo.show-salida', compact('salida'));
    }

    //PDFs
    public function salidaEquipos($id)
    {
        $salida = salidaEquipo::find($id);
        $lista = salidaEquipo::find($salida->id)->saco()->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de detalles de salida de equipos de código: ' . $id);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.salidaEquipos', compact('salida', 'lista'));
        return $pdf->download('salida de equipo: ' . $salida->fecha . '.pdf');
    }

    public function salidaEquiposlista($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $salidas = salidaEquipo::where('id', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();

        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de salidas de equipos');


        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.salidaEquiposLista', compact('salidas'));
        return $pdf->download('salidas de equipos: ' . now() . '.pdf');
    }

    public function regresoEquipos($id)
    {
        $regreso = regresoEquipo::find($id);
        $lista = regresoEquipo::find($regreso->id)->regreso()->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de detalles de regreso de equipos de código: ' . $id);

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.regresoEquipos', compact('regreso', 'lista'));
        return $pdf->download('regreso de equipo: ' . $regreso->fecha . '.pdf');
    }

    public function regresoEquiposlista($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $regresos = regresoEquipo::where('id', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de regresos de equipos');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.regresoEquiposLista', compact('regresos'));
        return $pdf->download('regresos de equipos: ' . now() . '.pdf');
    }
    public function pdfListaEquipo($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $equipos = equipo::where('codigo', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de equipos');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.equipoLista', compact('equipos'));
        return $pdf->download('Lista de equipos: ' . now() . '.pdf');
    }
}
