<?php

use App\Http\Controllers\EquipoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\inicioController;
use App\Http\Controllers\InventarioController;
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

/* MODULO EQUIPOS */
Route::get('/equipos', [EquipoController::class, 'equipos'])->name('equipos')->middleware('auth');
Route::get('/almacenes', [EquipoController::class, 'almacens'])->name('almacenes')->middleware('auth');
Route::get('/salidaEquipos', [EquipoController::class, 'salidas'])->name('salidasEquipo')->middleware('auth');
Route::get('/salidaEquipos/show/{id}', [EquipoController::class, 'show_salidas'])->name('salidasEquipos.show')->middleware('auth');
Route::get('/regresoEquipos', [EquipoController::class, 'regresos'])->name('regresosEquipo')->middleware('auth');
Route::get('/regresoEquipos/show/{id}', [EquipoController::class, 'show_regresos'])->name('regresosEquipos.show')->middleware('auth');


Route::get('/equipo',[InventarioController::class,'equipos'])->name('equipo')->middleware('auth');
Route::get('/almacen',[InventarioController::class,'almacen'])->name('almacen')->middleware('auth');
Route::get('/salidaEquipo',[InventarioController::class,'salida'])->name('salidaEquipo')->middleware('auth');
Route::get('/salidaEquipo/{id}',[InventarioController::class,'salidaShow'])->name('salidaEquipo.show')->middleware('auth');
Route::get('/regresoEquipo',[InventarioController::class,'regreso'])->name('regresoEquipo')->middleware('auth');
Route::get('/regresoEquipo/{id}',[InventarioController::class,'regresoShow'])->name('regresoEquipo.show')->middleware('auth');

/* MODULO PERSONAL */
Route::get('/personal', [PersonalController::class, 'personal'])->name('personal')->middleware('auth');
Route::get('/personal/show/{id}', [PersonalController::class, 'datos'])->name('personal.show')->middleware('auth');
Route::get('/trabajos', [PersonalController::class, 'trabajos'])->name('trabajos')->middleware('auth');
Route::get('/seccion', [PersonalController::class, 'seccion'])->name('seccion')->middleware('auth');
Route::get('/horario', [PersonalController::class, 'horario'])->name('horario')->middleware('auth');
Route::get('/reporteAsistencia', [PersonalController::class, 'reportes'])->name('reporte.asistencia')->middleware('auth');
Route::get('/reporteAsistencia/show/{id}', [PersonalController::class, 'permisos'])->name('reporteAsistencia.show')->middleware('auth');
Route::get('/reporteTrabajo', [PersonalController::class, 'trabajo_realizado'])->name('reporte.trabajo')->middleware('auth');
Route::get('/reporteTrabajo/{id}', [PersonalController::class, 'reporte'])->name('reporte.trabajo.show')->middleware('auth');


/*MODULO AREAS COMUNES */
Route::get('/calendario', [ReservaController::class, 'index'])->name('reserva')->middleware('auth');
Route::get('/reservas', [ReservaController::class, 'reservas'])->name('reserva.all')->middleware('auth');
Route::get('/lista', [ReservaController::class, 'list'])->name('reserva.list')->middleware('auth');
Route::get('/reserva/{id}', [ReservaController::class, 'reservaShow'])->name('reserva.show')->middleware('auth');
Route::get('/areacomun', [ReservaController::class, 'areas'])->name('areacomun')->middleware('auth');

/*MODULO DE SEGURIDAD */
Route::get('/residentes', [seguridadController::class, 'residentes'])->name('residentes')->middleware('auth');
Route::get('/visitantes', [seguridadController::class, 'visitantes'])->name('visitantes')->middleware('auth');
Route::get('/motorizados', [seguridadController::class, 'motorizados'])->name('motorizados')->middleware('auth');
Route::get('/viviendas', [seguridadController::class, 'viviendas'])->name('viviendas')->middleware('auth');
Route::get('/ingreso', [seguridadController::class, 'ingresos'])->name('ingresos')->middleware('auth');
Route::get('/ingreso/{id}', [seguridadController::class, 'showIngreso'])->name('ingresos.show')->middleware('auth');
Route::get('/salida', [seguridadController::class, 'salidas'])->name('salidas')->middleware('auth');
Route::get('/salida/{id}', [seguridadController::class, 'showSalida'])->name('salidas.show')->middleware('auth');

/*MODULO SISTEMA */
Route::get('/usuarios', [sistemaController::class, 'usuarios'])->name('usuarios')->middleware('auth');
Route::get('/roles', [sistemaController::class, 'roles'])->name('roles')->middleware('auth');
Route::get('/bitacora', [sistemaController::class, 'bitacora'])->name('bitacora')->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
