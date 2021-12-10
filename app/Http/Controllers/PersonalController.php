<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {
        return view('Personal.personal');
    }

    public function reportes()
    {
        return view('Personal.reporteA');
    }

}
