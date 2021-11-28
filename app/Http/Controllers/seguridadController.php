<?php

namespace App\Http\Controllers;

use App\Models\ingresoUrb;
use Illuminate\Http\Request;

class seguridadController extends Controller
{
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
}
