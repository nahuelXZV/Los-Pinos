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

    public function detallesReserva($id)
    {
        $ingreso = ingresoUrb::find($id);
        return view('seguridad.showIngreso', compact('ingreso'));
    }

    public function areas()
    {
        return view('AreaComun.areacomun');
    }
}
