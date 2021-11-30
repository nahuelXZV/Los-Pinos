<?php

use App\Http\Controllers\inicioController;
use App\Http\Controllers\ReservaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seguridadController;
use App\Http\Controllers\sistemaController;

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

Route::get('/', [inicioController::class, 'dashboard'])->name('inicio')->middleware('auth');

Route::get('/reporte', function () {
    return view('diseño-reporte');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/inventario', function () {
    return view('Inventario/show-inventario');
})->name('show-inventario')->middleware('auth');

/*MODULO AREAS COMUNES */
Route::get('/reserva', [ReservaController::class, 'index'])->name('reserva')->middleware('auth');
Route::get('/reserva/all', [ReservaController::class, 'reservas'])->name('reserva.all')->middleware('auth');
Route::get('/reserva/list', [ReservaController::class, 'list'])->name('reserva.list')->middleware('auth');
Route::get('/reserva/show/{id}', [ReservaController::class, 'show'])->name('reserva.show')->middleware('auth');
Route::get('/areacomun', [ReservaController::class, 'areas'])->name('areacomun')->middleware('auth');

/*MODULO DE SEGURIDAD */
Route::get('/residentes', [seguridadController::class, 'residentes'])->name('residentes')->middleware('auth');
Route::get('/visitantes', [seguridadController::class, 'visitantes'])->name('visitantes')->middleware('auth');
Route::get('/motorizados', [seguridadController::class, 'motorizados'])->name('motorizados')->middleware('auth');
Route::get('/viviendas', [seguridadController::class, 'viviendas'])->name('viviendas')->middleware('auth');
Route::get('/ingreso', [seguridadController::class, 'ingresos'])->name('ingresos')->middleware('auth');
Route::get('/ingreso/show/{id}', [seguridadController::class, 'showIngreso'])->name('ingresos.show')->middleware('auth');
Route::get('/salida', [seguridadController::class, 'salidas'])->name('salidas')->middleware('auth');
Route::get('/salida/show/{id}', [seguridadController::class, 'showSalidas'])->name('salidas.show')->middleware('auth');

/*MODULO SISTEMA */
Route::get('/usuarios', [sistemaController::class, 'usuarios'])->name('usuarios')->middleware('auth');
Route::get('/roles', [sistemaController::class, 'roles'])->name('roles')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
