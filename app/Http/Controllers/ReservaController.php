<?php

namespace App\Http\Controllers;

use App\Models\areaComun;
use App\Models\ingresoUrb;
use App\Models\Reserva;
use App\Models\residente;

class ReservaController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:reserva')->only('index');
        $this->middleware('can:reserva.all')->only('reservas');
        $this->middleware('can:reserva.list')->only('list');
        $this->middleware('can:reserva.show')->only('reservaShow');
        $this->middleware('can:areacomun')->only('areas');
    }

    public function index()
    {
        return view('AreaComun.reserva');
    }

    public function reservas()
    {
        $reserva = reserva::all();
        return response()->json($reserva);
    }

    public function list()
    {
        return view('AreaComun.list');
    }

    public function reservaShow($id)
    {
        $reserva = reserva::find($id);
        return view('AreaComun.show', compact('reserva'));
    }

    public function areas()
    {
        return view('AreaComun.areacomun');
    }

    public function reservaPdf($id)
    {
        $reserva = Reserva::find($id);
        $reportes = reserva::find($reserva->id)->reporteAC()->get();
        $lista = reserva::find($reserva->id)->invitado()->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.reserva', compact('reserva', 'reportes', 'lista'));
        return $pdf->download('reserva: ' . $reserva->fecha . '.pdf');
    }

    public function listaReserva($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $reservas = reserva::where('id', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();

        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.reservaLista', compact('reservas'));
        return $pdf->download('lista de reservas: ' . now() . '.pdf');
    }
}
