<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sistemaController extends Controller
{
    public function __construct()
    {
        //$this->middleware('can:usuarios')->only('usuarios');
        //$this->middleware('can:roles')->only('roles');
    }

    public function usuarios()
    {
        return view('sistema.usuario');
    }
    public function roles()
    {
        return view('sistema.roles');
    }
}
