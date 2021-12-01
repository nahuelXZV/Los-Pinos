<?php

namespace App\Http\Controllers;

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
}
