<?php

namespace App\Http\Controllers;

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
}
