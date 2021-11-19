<?php

use App\Http\Controllers\ReservaController;
use App\Http\Livewire\AreaComun\LwAreaComun;
use App\Http\Livewire\AreaComun\LwListAC;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seguridadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/reporte', function () {
    return view('diseño-reporte');
});
Route::get('/calendar', function () {
    return view('layouts.plantilla');
});
Route::get('/icono', function () {
    return view('components.iconos');
});
<<<<<<< HEAD
Route::middleware(['auth:sanctum', 'verified'])->get('/inventario', function () {
    return view('Inventario/show-inventario');
})->name('show-inventario');
=======






















/*MODULO AREAS COMUNES */
Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva');
Route::get('/reserva/all', [ReservaController::class, 'reservas'])->name('reserva.all');
Route::get('/reserva/list', [ReservaController::class, 'list'])->name('reserva.list');
Route::get('/reserva/show/{id}', [ReservaController::class, 'show'])->name('reserva.show');
Route::get('/areacomun', [ReservaController::class, 'areas'])->name('areacomun');

/*MODULO DE SEGURIDAD */
Route::get('/residentes', [seguridadController::class, 'residentes'])->name('residentes');
Route::get('/visitantes', [seguridadController::class, 'visitantes'])->name('visitantes');
Route::get('/motorizados', [seguridadController::class, 'motorizados'])->name('motorizados');
Route::get('/viviendas', [seguridadController::class, 'viviendas'])->name('viviendas');
Route::get('/ingreso', [seguridadController::class, 'ingresos'])->name('ingresos');
Route::get('/salida', [seguridadController::class, 'salidas'])->name('salidas');


>>>>>>> cfc3a4aadba7e96f2715b3d47cdbce9f1265ba12

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
