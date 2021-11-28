<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class inicioController extends Controller
{
    public function dashboard()
    {
        $CResidente = DB::select('select count(*) as cantidad from residentes');
        //return $CResidente;
        return view('dashboard');
    }
}
