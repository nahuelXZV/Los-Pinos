<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class sistemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:usuarios')->only('usuarios');
        $this->middleware('can:roles')->only('roles');
        $this->middleware('can:bitacora')->only('bitacora');
    }

    public function usuarios()
    {
        return view('sistema.usuario');
    }
    public function roles()
    {
        return view('sistema.roles');
    }

    public function bitacora()
    {
        return view('sistema.bitacora');
    }

    public function pdfListaUsuario($search, $sort, $direction)
    {
        if ($search == '_@_')
            $search = '';
        $usuarios = User::where('id', 'like', '%' . $search . '%')
            ->orderBy($sort, $direction)->get();
        $bitacora = new bitacora();
        $bitacora->crear('Descargó el reporte de asistencias');
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('pdfs.usuarioLista', compact('usuarios'));
        return $pdf->download('Lista de usuarios: ' . now() . '.pdf');
    }
}
